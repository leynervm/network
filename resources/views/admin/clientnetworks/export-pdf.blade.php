<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Reporte de Clientes Internet</title>
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
            padding: 2px 6px;
            border-radius: 4px;
            font-weight: bold;
            text-align: center;
            color: #ffffff;
        }

        .badge-activo {
            background-color: #10b981;
        }

        .badge-suspendido {
            background-color: #ef4444;
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
                <div class="title">Reporte de Clientes Internet</div>
                <div class="meta-text">
                    Generado el: <strong>{{ now()->format('d/m/Y h:i:s A') }}</strong>
                </div>
            </td>
            <td style="width: 50%;" class="meta-right">
                <div>Documento Administrativo Oficial</div>
                <div style="margin-top: 2px;">
                    Total Registros: <strong>{{ count($clientnetworks) }}</strong>
                </div>
            </td>
        </tr>
    </table>

    <table class="data-table">
        <thead>
            <tr>
                <th style="width: 3%;">N°</th>
                <th style="width: 10%;">Cód. Serv / SLP</th>
                <th style="width: 8%;">Fecha Alta</th>
                <th style="width: 25%;">Cliente</th>
                <th style="width: 9%;">Teléfono</th>
                <th style="width: 18%;">Lugar</th>
                <th style="width: 8%;">Servicio</th>
                <th style="width: 15%;">Conexión</th>
                {{-- <th style="width: 6%;">Precio</th> --}}
                <th style="width: 7%;">Estado</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($clientnetworks as $index => $item)
                <tr>
                    <td class="text-center">{{ $index + 1 }}</td>
                    <td class="text-center">
                        <span class="font-bold">{{ $item->code }}</span>
                        @if ($item->codigo_slp)
                            <br />
                            <span style="color: #1d4ed8; font-weight: bold;">SLP: {{ $item->codigo_slp }}</span>
                        @endif
                    </td>
                    <td class="text-center">{{ formatDate($item->date, 'DD/MM/YYYY') }}</td>
                    <td>
                        <span class="font-bold">{{ $item->client->name }}</span>
                        <br />
                        <span style="color: #555;">Doc: {{ $item->client->document }}</span>
                    </td>
                    <td class="text-center">
                        @if ($item->telefono)
                            {{ implode(' ', str_split($item->telefono, 3)) }}
                        @endif
                    </td>
                    <td>
                        @if ($item->direccion)
                            {{ $item->direccion }}
                        @endif

                        @if ($item->ubigeo)
                            - {{ $item->ubigeo->distrito }} -
                            {{ $item->ubigeo->provincia }}
                        @endif
                    </td>
                    <td class="text-center">{{ $item->type }}</td>
                    <td>
                        @if ($item->networkable)
                            @if ($item->isSatelital())
                                <span style="color: #555;">{{ $item->networkable->name }}</span>
                                <br />
                                <span>{{ $item->networkable->direccion }}</span>
                            @else
                                <span style="color: #555;">
                                    {{ $item->networkable->boxnav?->spliter?->olt?->name }} »
                                    {{ $item->networkable->boxnav?->spliter?->name }} »
                                    {{ $item->networkable->boxnav?->name }}
                                </span>
                                <br />
                                <span class="font-bold">
                                    {{ $item->networkable->alias ?: $item->networkable->code }}
                                </span>
                            @endif
                        @else
                            -
                        @endif
                    </td>
                    {{-- <td class="text-right font-bold">S/. {{ number_format($item->price, 2, '.', ',') }}</td> --}}
                    <td class="text-center">
                        @if ($item->isSuspendido())
                            <span class="badge badge-suspendido">SUSPENDIDO</span>
                        @else
                            <span class="badge badge-activo">ACTIVO</span>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="footer-page">
        Pág.
        <script type="text/php">
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
