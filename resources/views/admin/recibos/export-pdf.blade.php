<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Reporte de Recibos</title>
    <style>
        @page {
            size: a4 portrait;
            margin: 1.5cm 1cm 1.5cm 1cm;
        }
        body {
            font-family: 'Helvetica', 'Arial', sans-serif;
            font-size: 8px;
            color: #333333;
            line-height: 1.3;
        }
        .header-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 15px;
        }
        .header-table td {
            border: none;
            padding: 0;
        }
        .title {
            font-size: 14px;
            font-weight: bold;
            color: #1a1a1a;
            margin: 0 0 5px 0;
            text-transform: uppercase;
        }
        .meta-text {
            font-size: 8px;
            color: #555555;
        }
        .meta-right {
            text-align: right;
            font-size: 8px;
            color: #555555;
        }
        .filter-badge {
            display: inline-block;
            background-color: #f3f4f6;
            padding: 2px 3px;
            border-radius: 3px;
            font-weight: bold;
            font-size: 8px;
            color: #374151;
        }
        .data-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        .data-table th {
            background-color: #1f2937;
            color: #ffffff;
            font-weight: bold;
            text-align: center;
            padding: 6px 4px;
            border: 1px solid #1f2937;
            text-transform: uppercase;
            font-size: 8px;
        }
        .data-table td {
            padding: 5px 4px;
            border: 1px solid #e5e7eb;
            vertical-align: middle;
        }
        .data-table tr:nth-child(even) {
            background-color: #f9fafb;
        }
        .text-center {
            text-align: center;
        }
        .text-left {
            text-align: left;
        }
        .text-right {
            text-align: right;
        }
        .font-bold {
            font-weight: bold;
        }
        .badge {
            display: inline-block;
            padding: 2px 3px;
            border-radius: 4px;
            font-weight: bold;
            text-align: center;
            font-size: 8px;
            color: #ffffff;
        }
        .badge-pagado {
            background-color: #10b981;
        }
        .badge-pendiente {
            background-color: #f59e0b;
        }
        .totals-row {
            background-color: #f3f4f6 !important;
            font-weight: bold;
        }
        .totals-row td {
            border-top: 2px solid #111827;
            border-bottom: 2px solid #111827;
        }
        .footer-page {
            position: fixed;
            bottom: -0.8cm;
            left: 0;
            right: 0;
            height: 0.5cm;
            text-align: center;
            font-size: 7px;
            color: #9ca3af;
            border-top: 1px solid #e5e7eb;
            padding-top: 4px;
        }
    </style>
</head>
<body>

    <table class="header-table">
        <tr>
            <td style="width: 50%;">
                <div class="title">Reporte de Recibos Emitidos</div>
                <div class="meta-text">
                    Generado el: <strong>{{ now()->format('d/m/Y h:i:s A') }}</strong>
                </div>
            </td>
            <td style="width: 50%;" class="meta-right">
                <div>Documento Administrativo Oficial</div>
                <div style="margin-top: 2px;">
                    Total Registros: <strong>{{ count($recibos) }}</strong>
                </div>
            </td>
        </tr>
    </table>

    <table class="data-table">
        <thead>
            <tr>
                <th style="width: 3%;">N°</th>
                <th style="width: 10%;">Teléfono</th>
                <th style="width: 8%;">Vence</th>
                <th style="width: 8%;">Serie</th>
                <th style="width: 21%;">Cliente</th>
                <th style="width: 10%;">Lugar</th>
                <th style="width: 12%;">Tipo Servicio</th>
                <th style="width: 9%;">Mes</th>
                <th style="width: 6%;">Subtotal</th>
                <th style="width: 6%;">Dscto</th>
                <th style="width: 10%;">Total</th>
                <th style="width: 7%;">Estado</th>
            </tr>
        </thead>
        <tbody>
            @php
                $totalSubtotal = 0;
                $totalDescuento = 0;
                $totalMonto = 0;
            @endphp
            @foreach ($recibos as $index => $item)
                @php
                    $totalSubtotal += $item->amount;
                    $totalDescuento += $item->descuento;
                    $totalMonto += $item->total;
                @endphp
                <tr>
                    <td class="text-center">{{ $index + 1 }}</td>
                    <td class="text-center">{{ $item->network->telefono ?? '-' }}</td>
                    <td class="text-center">{{ formatDate($item->vencimiento, 'DD/MM/YYYY') }}</td>
                    <td class="text-center font-bold">{{ $item->seriecompleta }}</td>
                    <td>
                        <span class="font-bold">{{ $item->client->name }}</span>
                        <br/>
                        <span style="color: #666;">Doc: {{ $item->client->document }}</span>
                        @if ($item->network->codigo_slp)
                            <br/>
                            <span style="color: #1d4ed8; font-weight: bold;">SLP: {{ $item->network->codigo_slp }}</span>
                        @endif
                    </td>
                    <td>
                        @if ($item->network->direccion)
                            {{ $item->network->direccion }}
                        @endif

                        @if ($item->network->ubigeo)
                            - {{ $item->network->ubigeo->distrito }} -
                            {{ $item->network->ubigeo->provincia }}
                        @endif
                    </td>
                    <td class="text-center">
                        {{ $item->network->type ?? '-' }}
                    </td>
                    <td class="text-center" style="text-transform: uppercase;">
                        {{ formatDate($item->month, 'MMMM Y') }}
                    </td>
                    <td class="text-right">S/. {{ number_format($item->amount, 2, '.', ',') }}</td>
                    <td class="text-right">S/. {{ number_format($item->descuento, 2, '.', ',') }}</td>
                    <td class="text-right font-bold">S/. {{ number_format($item->total, 2, '.', ',') }}</td>
                    <td class="text-center">
                        @if ($item->payment)
                            <span class="badge badge-pagado">PAGADO</span>
                        @else
                            <span class="badge badge-pendiente">PENDIENTE</span>
                        @endif
                    </td>
                </tr>
            @endforeach

            {{-- Totales --}}
            <tr class="totals-row">
                <td colspan="8" class="text-right">TOTALES GENERALES:</td>
                <td class="text-right">S/. {{ number_format($totalSubtotal, 2, '.', ',') }}</td>
                <td class="text-right">S/. {{ number_format($totalDescuento, 2, '.', ',') }}</td>
                <td class="text-right">S/. {{ number_format($totalMonto, 2, '.', ',') }}</td>
                <td></td>
            </tr>
        </tbody>
    </table>

    <div class="footer-page">
        Pág. <script type="text/php">
            if (isset($pdf)) {
                $x = $pdf->get_width() - 50;
                $y = $pdf->get_height() - 25;
                $text = "{PAGE_NUM} de {PAGE_COUNT}";
                $font = $fontMetrics->get_font("Helvetica", "normal");
                $size = 7;
                $color = array(0.6, 0.6, 0.6);
                $word_space = 0.0;
                $char_space = 0.0;
                $angle = 0.0;
                $pdf->page_text($x, $y, $text, $font, $size, $color, $word_space, $char_space, $angle);
            }
        </script>
    </div>

</body>
</html>
