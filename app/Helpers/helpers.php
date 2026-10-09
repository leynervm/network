<?php

use App\Models\Client;
use App\Models\Network;
use Carbon\Carbon;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

function formatDate($date, $format = "DD MMMM Y")
{
    return Carbon::parse($date)->locale('es')->isoFormat($format);
}

function toastJson($title, $icon = 'success')
{
    return response()->json(['icon' => $icon, 'title' => $title])->getData();
}

function alertJson($title, $text, $icon = 'success')
{
    return response()->json(['icon' => $icon, 'title' => $title, 'text' => $text])->getData();
}

function validarFibra($type)
{
    return $type == Network::TV || $type == Network::FIBRA || $type == Network::FIBRA_TV;
}

function amountDays($startDate, $endDate, $amount)
{
    $fecha_alta = Carbon::parse($startDate);
    $ultimoDiaDelMes = Carbon::parse($startDate)->endOfMonth();
    $diasTranscurridos = $fecha_alta->diffInDays($ultimoDiaDelMes);
    $precioDiario = $amount / $ultimoDiaDelMes->day;
    $amount = $diasTranscurridos * $precioDiario;
    return $amount;
}



function getCliente($document)
{

    $documentLength = Str::length($document);
    $token = config('services.apisunat.token');
    $urlruc = config('services.apisunat.urlruc');
    $urldni = config('services.apisunat.urldni');
    $token2 = config('services.apisunat.token_secondary');
    $urldni2 = 'https://dniruc.apisperu.com/api/v1/dni/';

    try {
        $cliente = Client::where('document', $document)->first();
        if ($cliente) {
            $json = [
                'success' => true,
                'name' => $cliente->name,
                'client_id' => $cliente->id
            ];
        } else {

            $urlconsulta = $documentLength == 8 ? $urldni : $urlruc;
            $urlreferer = $documentLength == 8 ? 'https://apis.net.pe/consulta-dni-api' : 'http://apis.net.pe/api-ruc';

            $response = Http::withHeaders([
                'Referer' => $urlreferer,
                'Authorization' => 'Bearer ' . $token,
            ])->timeout(3)->get($urlconsulta . $document);

            if ($response->ok()) {
                $data = json_decode($response->body());
                $name = $documentLength == 8 ? "$data->nombres $data->apellidoPaterno $data->apellidoMaterno"
                    : $data->razonSocial;
                $direccion = $data->direccion ?? null;
                $cliente = Client::create([
                    'document' => $document,
                    'name' => $name,
                    'direccion' => $direccion
                ]);
                $json = [
                    'success' => true,
                    'name' => $name,
                    'client_id' => $cliente->id
                ];
            } else {
                $data = json_decode($response->body());
                $json = [
                    'success' => false,
                    'mensaje' => $data->message ?? 'No se encontró información para el documento ingresado.'
                ];
            }


            // $response2 = Http::get($urldni2  . $document . '?token=' . $token2);

            // if ($response2->success) {

            //     $nombre = $response2->nombres;
            //     $paterno = $response2->apellidoPaterno;
            //     $materno = $response2->apellidoMaterno;
            // }

        }
    } catch (Exception $e) {
        $mensaje = $e->getMessage();
        if ($e instanceof \Illuminate\Http\Client\ConnectionException || str_contains($mensaje, 'timed out') || str_contains($mensaje, 'cURL error 28')) {
            $mensaje = 'Tiempo de espera agotado al consultar servicio externo (3s). Intente nuevamente o verifique su conexión.';
        }

        $json = [
            'success' => false,
            'mensaje' => $mensaje
        ];
    }

    return response()->json($json)->getData();
}

if (!function_exists('generateDynamicEmvcoQr')) {
    /**
     * Genera un código QR dinámico EMVCo MPM para pagos (compatible con Yape / Plin / Interoperabilidad Perú).
     */
    function generateDynamicEmvcoQr(
        string $merchantAccountTLV,
        string $merchantName,
        string $merchantCity,
        float|int|string $amount,
        string $orderReference,
        int $qrSize = 300
    ): \App\DTOs\Payment\EmvcoQrResult {
        return app(\App\Services\Payment\EmvcoQrService::class)->generateDynamicQr(
            merchantAccountTLV: $merchantAccountTLV,
            merchantName: $merchantName,
            merchantCity: $merchantCity,
            amount: $amount,
            orderReference: $orderReference,
            qrSize: $qrSize
        );
    }
}

if (!function_exists('generateYapeQr')) {
    /**
     * Genera un código QR dinámico de Yape / Interoperabilidad BCRP para cobro por celular.
     */
    function generateYapeQr(
        float|int|string $amount,
        string $orderReference,
        string $phone = '+51928393901',
        string $merchantName = 'INTERNET SERVICE',
        string $merchantCity = 'LIMA',
        int $qrSize = 180
    ): \App\DTOs\Payment\EmvcoQrResult {
        return app(\App\Services\Payment\EmvcoQrService::class)->generateForPhone(
            phone: $phone,
            merchantName: $merchantName,
            merchantCity: $merchantCity,
            amount: $amount,
            orderReference: $orderReference,
            qrSize: $qrSize
        );
    }
}

if (!function_exists('generateYapeFromBaseQr')) {
    /**
     * Genera un código QR dinámico de Yape inyectando monto y opcionalmente referencia sobre el QR base del titular.
     */
    function generateYapeFromBaseQr(
        string $baseQrString,
        float|int|string $amount,
        ?string $orderReference = null,
        int $qrSize = 130
    ): \App\DTOs\Payment\EmvcoQrResult {
        return app(\App\Services\Payment\EmvcoQrService::class)->generateFromBaseQr(
            baseQrString: $baseQrString,
            amount: $amount,
            orderReference: $orderReference,
            qrSize: $qrSize
        );
    }
}
