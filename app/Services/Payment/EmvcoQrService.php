<?php

declare(strict_types=1);

namespace App\Services\Payment;

use App\DTOs\Payment\EmvcoQrResult;
use BaconQrCode\Renderer\ImageRenderer;
use BaconQrCode\Renderer\Image\SvgImageBackEnd;
use BaconQrCode\Renderer\RendererStyle\RendererStyle;
use BaconQrCode\Writer;
use InvalidArgumentException;

/**
 * Servicio especializado en generación de códigos QR de pago dinámicos bajo el estándar
 * EMVCo MPM (Merchant-Presented Mode) e interoperabilidad del Banco Central de Reserva
 * del Perú (BCRP / Yape / Plin / Interbancario).
 */
class EmvcoQrService
{
    // Constantes del Estándar EMVCo MPM
    private const TAG_PAYLOAD_FORMAT_INDICATOR = '00';
    private const TAG_POINT_OF_INITIATION_METHOD = '01';
    private const TAG_MERCHANT_CATEGORY_CODE    = '52';
    private const TAG_TRANSACTION_CURRENCY      = '53';
    private const TAG_TRANSACTION_AMOUNT        = '54';
    private const TAG_COUNTRY_CODE              = '58';
    private const TAG_MERCHANT_NAME             = '59';
    private const TAG_MERCHANT_CITY             = '60';
    private const TAG_ADDITIONAL_DATA           = '62';
    private const TAG_CRC16                     = '63';

    // Sub-tags de Tag 62 (Additional Data Field Template)
    private const SUBTAG_BILL_OR_REFERENCE      = '01';

    // Valores estándar para Perú y Dinámico
    private const VALUE_PAYLOAD_FORMAT          = '01';
    private const VALUE_POINT_DYNAMIC           = '12'; // '12' = Dynamic QR (monto fijo no modificable por pagador)
    private const VALUE_MCC_DEFAULT             = '0000';
    private const VALUE_CURRENCY_PEN            = '604'; // ISO 4217: Sol Peruano
    private const VALUE_COUNTRY_PE              = 'PE';

    /**
     * Genera un código QR dinámico EMVCo MPM completo.
     *
     * @param string           $merchantAccountTLV Cadena TLV (Tag 26..51) o número de celular (+519XXXXXXXX).
     * @param string           $merchantName       Nombre del comercio/titular (alfanumérico, máx. 25 caracteres).
     * @param string           $merchantCity       Ciudad del comercio (alfanumérico, máx. 15 caracteres).
     * @param float|int|string $amount             Monto en Soles a cobrar (se formatea con 2 decimales, ej: 15.50).
     * @param string           $orderReference     Identificador del pedido o recibo (máx. 25 caracteres, Tag 62 sub 01).
     * @param int              $qrSize             Tamaño en píxeles de la imagen QR (por defecto 300px).
     * @param int              $qrMargin           Margen/Quiet Zone del QR (por defecto 2 módulos).
     *
     * @throws InvalidArgumentException Si algún parámetro de entrada no cumple con las restricciones mínimas.
     * @return EmvcoQrResult Estructura tipada con el rawPayload, imagen Data URL Base64 y SVG.
     */
    public function generateDynamicQr(
        string $merchantAccountTLV,
        string $merchantName,
        string $merchantCity,
        float|int|string $amount,
        string $orderReference,
        int $qrSize = 300,
        int $qrMargin = 2
    ): EmvcoQrResult {
        // 1. Validaciones de entrada
        $cleanMerchantTLV = trim($merchantAccountTLV);
        if ($cleanMerchantTLV === '') {
            throw new InvalidArgumentException('El parámetro merchantAccountTLV no puede estar vacío.');
        }

        // Si se recibe directamente un número de teléfono (ej. +51928393901 o 928393901),
        // se empaqueta automáticamente en el bloque Tag 26 de Interoperabilidad BCRP / Yape.
        if (str_starts_with($cleanMerchantTLV, '+') || preg_match('/^[0-9]{9,13}$/', $cleanMerchantTLV)) {
            $cleanMerchantTLV = $this->buildPhoneAccountTlv($cleanMerchantTLV);
        }

        $numericAmount = (float) $amount;
        if ($numericAmount <= 0) {
            throw new InvalidArgumentException('El monto (amount) debe ser un número estrictamente mayor a 0.00.');
        }

        // 2. Sanitización y formateo conforme a especificación EMVCo
        $sanitizedName = $this->sanitizeText($merchantName, 25);
        if ($sanitizedName === '') {
            $sanitizedName = 'COMERCIO';
        }

        $sanitizedCity = $this->sanitizeText($merchantCity, 15);
        if ($sanitizedCity === '') {
            $sanitizedCity = 'LIMA';
        }

        $sanitizedReference = $this->sanitizeReference($orderReference, 25);
        if ($sanitizedReference === '') {
            $sanitizedReference = 'ORD-' . time();
        }

        // Monto estrictamente con dos decimales y punto separador
        $formattedAmount = number_format($numericAmount, 2, '.', '');

        // 3. Construcción del payload EMVCo MPM
        $rawPayload = $this->buildEmvcoPayload(
            merchantAccountTLV: $cleanMerchantTLV,
            merchantName: $sanitizedName,
            merchantCity: $sanitizedCity,
            formattedAmount: $formattedAmount,
            orderReference: $sanitizedReference
        );

        // 4. Generación de la imagen del código QR (Vector SVG Data URL)
        $svgMarkup = $this->renderQrSvg($rawPayload, $qrSize, $qrMargin);
        $dataUrlBase64 = 'data:image/svg+xml;base64,' . base64_encode($svgMarkup);
        $crc16 = substr($rawPayload, -4);

        return new EmvcoQrResult(
            rawPayload: $rawPayload,
            qrImage: $dataUrlBase64,
            svg: $svgMarkup,
            crc16: $crc16
        );
    }

    /**
     * Genera un código QR dinámico de Yape / Interoperabilidad BCRP directamente a partir
     * de un número de celular (+519XXXXXXXX).
     */
    public function generateForPhone(
        string $phone,
        string $merchantName,
        string $merchantCity,
        float|int|string $amount,
        string $orderReference,
        int $qrSize = 300,
        int $qrMargin = 2
    ): EmvcoQrResult {
        $tlv = $this->buildPhoneAccountTlv($phone);

        return $this->generateDynamicQr(
            merchantAccountTLV: $tlv,
            merchantName: $merchantName,
            merchantCity: $merchantCity,
            amount: $amount,
            orderReference: $orderReference,
            qrSize: $qrSize,
            qrMargin: $qrMargin
        );
    }

    /**
     * Construye el bloque TLV de cuenta (Tag 26) para un número de celular
     * bajo el estándar de Interoperabilidad BCRP (Yape / Plin / Bancos Perú).
     */
    public function buildPhoneAccountTlv(string $phone, string $guid = 'pe.bcrp'): string
    {
        $cleanPhone = trim($phone);
        // Si no tiene prefijo internacional +51 y tiene 9 dígitos peruanos, agregarlo
        if (preg_match('/^[0-9]{9}$/', $cleanPhone)) {
            $cleanPhone = '+51' . $cleanPhone;
        } elseif (!str_starts_with($cleanPhone, '+') && preg_match('/^51[0-9]{9}$/', $cleanPhone)) {
            $cleanPhone = '+' . $cleanPhone;
        }

        $sub00 = $this->formatTlv('00', $guid);
        $sub01 = $this->formatTlv(self::SUBTAG_BILL_OR_REFERENCE, $cleanPhone);

        return $this->formatTlv('26', $sub00 . $sub01);
    }

    /**
     * Parsea cualquier código QR EMVCo (como el QR estático de la app Yape)
     * y extrae los tags de cuenta (26 a 51), nombre del titular (59) y ciudad (60).
     *
     * @param string $rawQr Cadena de texto resultante de escanear el QR estático de Yape.
     * @return array{merchantAccountTLV: string, merchantName: string, merchantCity: string, tags: array<string, string>}
     */
    public function parseBaseQr(string $rawQr): array
    {
        $raw = trim($rawQr);
        $tags = [];
        $i = 0;
        $len = strlen($raw);

        while ($i < $len - 4) {
            $tag = substr($raw, $i, 2);
            $lengthStr = substr($raw, $i + 2, 2);
            if (!is_numeric($lengthStr)) {
                break;
            }
            $valLen = (int) $lengthStr;
            $value = substr($raw, $i + 4, $valLen);
            $tags[$tag] = $value;
            $i += 4 + $valLen;
        }

        // Extraer todos los tags de cuenta de comercio (26 al 51)
        $merchantAccountTLV = '';
        foreach ($tags as $tag => $val) {
            $tagNum = (int) $tag;
            if ($tagNum >= 26 && $tagNum <= 51) {
                $merchantAccountTLV .= $this->formatTlv(sprintf('%02d', $tagNum), (string) $val);
            }
        }

        return [
            'merchantAccountTLV' => $merchantAccountTLV,
            'merchantName'       => $tags['59'] ?? '',
            'merchantCity'       => $tags['60'] ?? '',
            'tags'               => $tags,
        ];
    }

    /**
     * Genera un QR dinámico inyectando el monto y la referencia directamente sobre el
     * QR estático base obtenido de la app Yape del titular.
     */
    /**
     * Genera un QR dinámico inyectando el monto y opcionalmente la referencia directamente sobre el
     * QR estático base obtenido de la app Yape del titular.
     * Preserva exactamente todos los tags originales (Tag 39, MCC 52, moneda 53, país 58, nombre 59, ciudad 60).
     */
    public function generateFromBaseQr(
        string $baseQrString,
        float|int|string $amount,
        ?string $orderReference = null,
        int $qrSize = 130,
        int $qrMargin = 2
    ): EmvcoQrResult {
        $parsed = $this->parseBaseQr($baseQrString);
        if ($parsed['merchantAccountTLV'] === '') {
            throw new InvalidArgumentException('No se encontraron tags de cuenta de comercio (Tag 26 a 51) en el QR base proporcionado.');
        }

        $numericAmount = (float) $amount;
        if ($numericAmount <= 0) {
            throw new InvalidArgumentException('El monto (amount) debe ser un número estrictamente mayor a 0.00.');
        }
        $formattedAmount = number_format($numericAmount, 2, '.', '');

        $mcc          = $parsed['tags']['52'] ?? '5611';
        $currency     = $parsed['tags']['53'] ?? '604';
        $country      = $parsed['tags']['58'] ?? 'PE';
        $merchantName = $parsed['tags']['59'] ?? 'YAPERO';
        $merchantCity = $parsed['tags']['60'] ?? 'Lima';

        // Estructura EMVCo preservando fielmente los tags del QR oficial de Yape
        $payload = $this->formatTlv('00', '01')
                 . $this->formatTlv('01', '12') // Dinámico
                 . $parsed['merchantAccountTLV'] // Tag 39 (32 bytes)
                 . $this->formatTlv('52', $mcc)
                 . $this->formatTlv('53', $currency)
                 . $this->formatTlv('54', $formattedAmount)
                 . $this->formatTlv('58', $country)
                 . $this->formatTlv('59', $merchantName)
                 . $this->formatTlv('60', $merchantCity);

        // Si se provee referencia de orden, inyectar Tag 62 (opcional)
        if (!empty($orderReference)) {
            $sanitizedRef = $this->sanitizeReference($orderReference, 25);
            $sub01 = $this->formatTlv(self::SUBTAG_BILL_OR_REFERENCE, $sanitizedRef);
            $payload .= $this->formatTlv(self::TAG_ADDITIONAL_DATA, $sub01);
        }

        $payloadWithCrcHeader = $payload . self::TAG_CRC16 . '04';
        $crc16 = $this->calculateCrc16CcittFalse($payloadWithCrcHeader);
        $fullPayload = $payloadWithCrcHeader . $crc16;

        $svgMarkup = $this->renderQrSvg($fullPayload, $qrSize, $qrMargin);
        $dataUrlBase64 = 'data:image/svg+xml;base64,' . base64_encode($svgMarkup);

        return new EmvcoQrResult(
            rawPayload: $fullPayload,
            qrImage: $dataUrlBase64,
            svg: $svgMarkup,
            crc16: $crc16
        );
    }

    /**
     * Construye la secuencia TLV y calcula el checksum CRC16.
     */
    public function buildEmvcoPayload(
        string $merchantAccountTLV,
        string $merchantName,
        string $merchantCity,
        string $formattedAmount,
        string $orderReference
    ): string {
        // Bloque Tag 62 (Additional Data Field Template) con Sub-tag 01
        $subTag01 = $this->formatTlv(self::SUBTAG_BILL_OR_REFERENCE, $orderReference);
        $tag62 = $this->formatTlv(self::TAG_ADDITIONAL_DATA, $subTag01);

        // Concatenación ordenada de bloques TLV
        $payloadWithoutCrc =
            $this->formatTlv(self::TAG_PAYLOAD_FORMAT_INDICATOR, self::VALUE_PAYLOAD_FORMAT) .
            $this->formatTlv(self::TAG_POINT_OF_INITIATION_METHOD, self::VALUE_POINT_DYNAMIC) .
            $merchantAccountTLV .
            $this->formatTlv(self::TAG_MERCHANT_CATEGORY_CODE, self::VALUE_MCC_DEFAULT) .
            $this->formatTlv(self::TAG_TRANSACTION_CURRENCY, self::VALUE_CURRENCY_PEN) .
            $this->formatTlv(self::TAG_TRANSACTION_AMOUNT, $formattedAmount) .
            $this->formatTlv(self::TAG_COUNTRY_CODE, self::VALUE_COUNTRY_PE) .
            $this->formatTlv(self::TAG_MERCHANT_NAME, $merchantName) .
            $this->formatTlv(self::TAG_MERCHANT_CITY, $merchantCity) .
            $tag62;

        // Se agrega el identificador de Tag 63 con su longitud 04 ('6304') antes de computar el CRC
        $payloadWithCrcHeader = $payloadWithoutCrc . self::TAG_CRC16 . '04';

        // Algoritmo CRC-16/CCITT-FALSE
        $crc16 = $this->calculateCrc16CcittFalse($payloadWithCrcHeader);

        return $payloadWithCrcHeader . $crc16;
    }

    /**
     * Formatea un bloque en la estructura estándar TLV (Tag-Length-Value).
     * Longitud con padding a 2 dígitos numéricos.
     */
    public function formatTlv(string $tag, string $value): string
    {
        $length = strlen($value);
        return sprintf('%02s%02d%s', $tag, $length, $value);
    }

    /**
     * Implementación nativa en PHP del algoritmo CRC-16/CCITT-FALSE.
     * 
     * Especificaciones EMVCo:
     * - Polinomio: 0x1021 (x^16 + x^12 + x^5 + 1)
     * - Valor Inicial: 0xFFFF
     * - RefIn: false (sin reflejo de bits de entrada)
     * - RefOut: false (sin reflejo de bits de salida)
     * - XOR Out: 0x0000
     * - Formato: 4 caracteres hexadecimales en MAYÚSCULAS.
     */
    public function calculateCrc16CcittFalse(string $data): string
    {
        $crc = 0xFFFF;
        $length = strlen($data);

        for ($i = 0; $i < $length; $i++) {
            $crc ^= (ord($data[$i]) << 8);

            for ($bit = 0; $bit < 8; $bit++) {
                if (($crc & 0x8000) !== 0) {
                    $crc = (($crc << 1) ^ 0x1021) & 0xFFFF;
                } else {
                    $crc = ($crc << 1) & 0xFFFF;
                }
            }
        }

        return strtoupper(sprintf('%04X', $crc));
    }

    /**
     * Sanitiza nombres o ciudades removiendo caracteres especiales, diacríticos (tildes)
     * y limitando la longitud máxima alfanumérica permitida por el estándar.
     */
    public function sanitizeText(string $text, int $maxLength): string
    {
        // Transliterar caracteres acentuados (ej: 'á' -> 'a', 'ñ' -> 'n')
        $transliterated = iconv('UTF-8', 'ASCII//TRANSLIT//IGNORE', $text);
        if ($transliterated === false) {
            $transliterated = $text;
        }

        // Mantener solo alfanuméricos y espacios
        $clean = preg_replace('/[^A-Za-z0-9 ]/', '', $transliterated);
        // Normalizar espacios múltiples
        $clean = preg_replace('/\s+/', ' ', trim((string) $clean));

        return substr(strtoupper((string) $clean), 0, $maxLength);
    }

    /**
     * Sanitiza la referencia de orden o factura (Tag 62 Sub-tag 01).
     * Permite alfanuméricos, guiones y guiones bajos.
     */
    public function sanitizeReference(string $reference, int $maxLength): string
    {
        $transliterated = iconv('UTF-8', 'ASCII//TRANSLIT//IGNORE', $reference);
        if ($transliterated === false) {
            $transliterated = $reference;
        }

        // Permitir caracteres comunes de folio: letras, números, '-', '_'
        $clean = preg_replace('/[^A-Za-z0-9\-_]/', '', (string) $transliterated);

        return substr(strtoupper(trim((string) $clean)), 0, $maxLength);
    }

    /**
     * Renderiza el código QR en formato SVG vectorial mediante BaconQrCode.
     */
    private function renderQrSvg(string $payload, int $size, int $margin): string
    {
        $renderer = new ImageRenderer(
            new RendererStyle($size, $margin),
            new SvgImageBackEnd()
        );

        $writer = new Writer($renderer);
        return $writer->writeString($payload);
    }
}
