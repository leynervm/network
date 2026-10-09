<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>TICKET - {{ $recibo->seriecompleta }}</title>
    <style>
        @page {
            padding: 0;
            margin: 2mm;
        }

        body {
            font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
            font-size: 10.5px;
            color: #1a1a1a;
            line-height: 1.35;
            margin: 0;
            padding: 8px;
            background-color: #ffffff;
        }

        .ticket-container {
            width: 100%;
            max-width: 320px;
            margin: 0 auto;
        }

        .header {
            text-align: center;
            margin-bottom: 8px;
        }

        .header h1 {
            font-size: 14px;
            font-weight: bold;
            margin: 0 0 3px 0;
            letter-spacing: 0.5px;
            text-transform: uppercase;
            color: #000000;
        }

        .header .subtitle {
            font-size: 9px;
            color: #555555;
            text-transform: uppercase;
            margin: 0;
        }

        .serie-box {
            text-align: center;
            margin: 4px 0 6px 0;
            font-family: 'Courier New', Courier, monospace;
            font-weight: bold;
            font-size: 13px;
            letter-spacing: 1px;
            color: #000000;
        }

        .divider {
            border-top: 1px dashed #666666;
            margin: 8px 0;
        }

        .section-title {
            font-size: 9px;
            font-weight: bold;
            color: #444444;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin: 0 0 4px 0;
        }

        .info-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 4px;
        }

        .info-table td {
            padding: 2.5px 0;
            vertical-align: top;
            font-size: 10px;
        }

        .info-table td.label {
            width: 35%;
            color: #555555;
            font-weight: bold;
        }

        .info-table td.value {
            width: 65%;
            color: #000000;
            text-align: right;
        }

        .info-table td.value-left {
            width: 65%;
            color: #000000;
            text-align: left;
        }

        .totals-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 4px;
        }

        .totals-table td {
            padding: 3px 0;
            font-size: 10.5px;
        }

        .totals-table tr.total-row td {
            border-top: 1px solid #000000;
            border-bottom: 1px solid #000000;
            font-weight: bold;
            font-size: 12px;
            padding: 5px 0;
            color: #000000;
        }

        .payment-box {
            border-top: 1px dashed #666666;
            border-bottom: 1px dashed #666666;
            padding: 6px 0;
            margin-top: 8px;
        }

        .payment-box .payment-status {
            text-align: center;
            font-weight: bold;
            font-size: 11px;
            color: #000000;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 4px;
        }

        .payment-box table {
            width: 100%;
            border-collapse: collapse;
        }

        .payment-box table td {
            font-size: 9.5px;
            padding: 1.5px 0;
            color: #1a1a1a;
        }

        .payment-box table td.p-label {
            font-weight: bold;
            width: 40%;
            color: #555555;
        }

        .payment-box table td.p-value {
            text-align: right;
            font-family: 'Courier New', Courier, monospace;
            width: 60%;
            color: #000000;
        }

        .pending-box {
            border-top: 1px dashed #666666;
            border-bottom: 1px dashed #666666;
            padding: 5px 0;
            margin-top: 6px;
            text-align: center;
            font-weight: bold;
            font-size: 10px;
            color: #000000;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .yape-card {
            border: 1.5px solid #742284;
            border-radius: 7px;
            overflow: hidden;
            margin-top: 7px;
            background: #ffffff;
            text-align: center;
        }

        .yape-header {
            background-color: #742284;
            color: #ffffff;
            padding: 4px 6px;
            text-align: center;
        }

        .yape-header-title {
            display: block;
            font-size: 11.5px;
            font-weight: bold;
            letter-spacing: 1px;
            color: #ffffff;
            text-transform: uppercase;
        }

        .yape-header-sub {
            display: block;
            font-size: 7.5px;
            color: #f1d5f7;
            margin-top: 1px;
            letter-spacing: 0.5px;
        }

        .yape-body {
            padding: 5px 4px 6px 4px;
            background: #fbf7fc;
        }

        .yape-qr-container {
            display: block;
            text-align: center;
            margin: 2px auto 4px auto;
        }

        .yape-qr-img {
            display: inline-block;
            width: 105px;
            height: 105px;
            background: #ffffff;
            padding: 3px;
            border: 1px solid #d8b8e3;
            border-radius: 5px;
        }

        .yape-amount-box {
            margin: 4px auto 3px auto;
            padding: 3px 8px;
            background-color: #ffffff;
            border: 1px dashed #742284;
            border-radius: 5px;
            display: inline-block;
        }

        .yape-amount-label {
            font-size: 7.5px;
            color: #555555;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .yape-amount-val {
            font-size: 15px;
            font-weight: bold;
            color: #742284;
            font-family: 'Courier New', Courier, monospace;
            letter-spacing: 0.5px;
            margin-top: 1px;
        }

        .yape-footer-info {
            font-size: 9px;
            color: #333333;
            margin-top: 3px;
        }

        .yape-footer-phone {
            font-size: 10px;
            font-weight: bold;
            color: #742284;
            font-family: 'Courier New', Courier, monospace;
            letter-spacing: 0.5px;
        }

        .yape-note {
            font-size: 7.5px;
            color: #777777;
            margin-top: 3px;
            font-style: italic;
        }

        .footer {
            text-align: center;
            margin-top: 8px;
            font-size: 8.5px;
            color: #666666;
            line-height: 1.35;
        }

        .footer .highlight {
            font-weight: bold;
            color: #000000;
            margin-bottom: 2px;
        }

        .text-mono {
            font-family: 'Courier New', Courier, monospace;
        }
    </style>
</head>

<body>
    <div class="ticket-container">
        {{-- Header --}}
        <div class="header">
            <h1>RECIBO DE SERVICIO</h1>
            {{-- <p class="subtitle">COMPROBANTE DE PAGO ELECTRÓNICO</p> --}}
        </div>

        {{-- Serie Box --}}
        <div class="serie-box">
            {{ $recibo->seriecompleta }}
        </div>

        <div class="divider"></div>

        {{-- Client Info --}}
        <div class="section-title">DATOS DEL CLIENTE</div>
        <table class="info-table">
            <tr>
                <td class="label">CLIENTE:</td>
                <td class="value-left font-bold">{{ $recibo->client->name }}</td>
            </tr>
            <tr>
                <td class="label">DOC / DNI:</td>
                <td class="value-left text-mono">{{ $recibo->client->document }}</td>
            </tr>
            <tr>
                <td class="label">DIRECCIÓN:</td>
                <td class="value-left">{{ $recibo->network->direccion ?? 'Sin dirección registrada' }}</td>
            </tr>
        </table>

        <div class="divider"></div>

        {{-- Service & Billing Info --}}
        <div class="section-title">DETALLE DEL SERVICIO</div>
        <table class="info-table">
            <tr>
                <td class="label">SERVICIO:</td>
                <td class="value font-bold">{{ $recibo->network->type }}</td>
            </tr>
            <tr>
                <td class="label">PLAN / VEL.:</td>
                <td class="value">{{ $recibo->network->descripcion ?? '-' }}</td>
            </tr>
            <tr>
                <td class="label">MES FACT.:</td>
                <td class="value text-mono uppercase font-bold">{{ formatDate($recibo->month, 'MMMM Y') }}</td>
            </tr>
            <tr>
                <td class="label">EMISIÓN:</td>
                <td class="value text-mono">{{ formatDate($recibo->date, 'DD/MM/YYYY') }}</td>
            </tr>
            <tr>
                <td class="label">VENCIMIENTO:</td>
                <td class="value text-mono font-bold">{{ formatDate($recibo->vencimiento, 'DD/MM/YYYY') }}</td>
            </tr>
        </table>

        <div class="divider"></div>

        {{-- Totals --}}
        <table class="totals-table">
            <tr>
                <td style="color: #555555;">SUBTOTAL:</td>
                <td style="text-align: right;" class="text-mono">S/ {{ number_format($recibo->amount, 2, '.', ', ') }}
                </td>
            </tr>
            @if ($recibo->descuento > 0)
                <tr>
                    <td style="color: #555555;">DESCUENTO:</td>
                    <td style="text-align: right;" class="text-mono">- S/
                        {{ number_format($recibo->descuento, 2, '.', ', ') }}</td>
                </tr>
            @endif
            <tr class="total-row">
                <td>TOTAL A PAGAR:</td>
                <td style="text-align: right;" class="text-mono">S/ {{ number_format($recibo->total, 2, '.', ', ') }}
                </td>
            </tr>
        </table>

        {{-- Payment Status Section (Only shown if paid) --}}
        @if ($recibo->payment)
            <div class="payment-box">
                <div class="payment-status">★ RECIBO PAGADO ★</div>
                <table>
                    <tr>
                        <td class="p-label">FECHA PAGO:</td>
                        <td class="p-value">{{ formatDate($recibo->payment->date, 'DD/MM/YYYY hh:mm A') }}</td>
                    </tr>
                    <tr>
                        <td class="p-label">MÉTODO:</td>
                        <td class="p-value font-bold">{{ $recibo->payment->formapay->name ?? 'EFECTIVO' }}</td>
                    </tr>
                    @if ($recibo->payment->codetransferencia)
                        <tr>
                            <td class="p-label">CÓD. OPER.:</td>
                            <td class="p-value">{{ $recibo->payment->codetransferencia }}</td>
                        </tr>
                    @endif
                    @if ($recibo->payment->detalle)
                        <tr>
                            <td class="p-label">DETALLE:</td>
                            <td class="p-value" style="font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;">
                                {{ $recibo->payment->detalle }}</td>
                        </tr>
                    @endif
                </table>
            </div>
        @else
            @if (!empty(config('services.yape.base_qr')) && !empty(config('services.yape.phone')))
                {{-- Código QR Dinámico Yape / Interoperabilidad Perú --}}
                @php
                    $baseQrYape = config('services.yape.base_qr');

                    $yapeQr = generateYapeFromBaseQr(
                        baseQrString: $baseQrYape,
                        amount: $recibo->total,
                        orderReference: null,
                        qrSize: 130
                    );
                @endphp

                <div class="yape-card">
                    <div class="yape-header">
                        <span class="yape-header-title">YAPEA AQUÍ</span>
                        <span class="yape-header-sub">YAPE • PLIN • BANCAS MÓVILES</span>
                    </div>
                    <div class="yape-body">
                        <div class="yape-qr-container">
                            <img src="{{ $yapeQr->qrImage }}" alt="QR Yape" class="yape-qr-img" />
                        </div>

                        <div class="yape-amount-box">
                            <div class="yape-amount-label">Monto exacto a pagar:</div>
                            <div class="yape-amount-val">S/ {{ number_format($recibo->total, 2, '.', ', ') }}</div>
                        </div>

                        <div class="yape-footer-info">
                            Número: <span class="yape-footer-phone">{{ config('services.yape.phone') }}</span>
                        </div>
                        {{-- <div class="yape-note">* El monto se autocompleta en tu app al escanear *</div> --}}
                    </div>
                </div>
            @endif

            <div class="pending-box">
                *** PENDIENTE DE PAGO ***
            </div>
        @endif

        {{-- Footer --}}
        <div class="footer">
            <p class="highlight">¡Gracias por su confianza y puntualidad!</p>
            <p>Conserve este ticket como comprobante oficial de su servicio de internet.</p>
        </div>
    </div>
</body>

</html>