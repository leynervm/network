<?php

declare(strict_types=1);

namespace App\DTOs\Payment;

use ArrayAccess;
use JsonSerializable;

/**
 * Data Transfer Object que encapsula el resultado de la generación del QR EMVCo MPM.
 * 
 * @implements ArrayAccess<string, mixed>
 */
final class EmvcoQrResult implements JsonSerializable, ArrayAccess
{
    /**
     * @param string $rawPayload Cadena EMVCo MPM completa incluyendo el CRC16 (Tag 63).
     * @param string $qrImage Data URL Base64 lista para src de etiquetas <img> (ej. data:image/svg+xml;base64,...).
     * @param string $svg Código XML / SVG en texto plano del código QR.
     * @param string $crc16 Checksum CRC16 hexadecimal calculado para Tag 63.
     */
    public function __construct(
        public readonly string $rawPayload,
        public readonly string $qrImage,
        public readonly string $svg = '',
        public readonly string $crc16 = ''
    ) {
    }

    /**
     * Serializa el DTO a un array asociativo.
     *
     * @return array<string, string>
     */
    public function toArray(): array
    {
        return [
            'rawPayload' => $this->rawPayload,
            'qrImage'    => $this->qrImage,
            'svg'        => $this->svg,
            'crc16'      => $this->crc16,
        ];
    }

    /**
     * Permite serializar directamente a JSON en respuestas Laravel (response()->json($result)).
     *
     * @return array<string, string>
     */
    public function jsonSerialize(): array
    {
        return $this->toArray();
    }

    public function offsetExists(mixed $offset): bool
    {
        return isset($this->toArray()[$offset]);
    }

    public function offsetGet(mixed $offset): mixed
    {
        return $this->toArray()[$offset] ?? null;
    }

    public function offsetSet(mixed $offset, mixed $value): void
    {
        throw new \BadMethodCallException('EmvcoQrResult es inmutable.');
    }

    public function offsetUnset(mixed $offset): void
    {
        throw new \BadMethodCallException('EmvcoQrResult es inmutable.');
    }

    public function __toString(): string
    {
        return $this->rawPayload;
    }
}
