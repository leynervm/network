<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class ClientNetworksExport implements FromQuery, WithHeadings, WithMapping, ShouldAutoSize, WithStyles
{
    use Exportable;

    protected $query;

    public function __construct($query)
    {
        $this->query = $query;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        return $this->query;
    }

    /**
     * @return array
     */
    public function headings(): array
    {
        return [
            'COD. SERVICIO',
            'CÓDIGO SLP',
            'FECHA ALTA',
            'CLIENTE DOCUMENTO',
            'CLIENTE NOMBRE',
            'TELÉFONO',
            'LUGAR',
            'DEPARTAMENTO',
            'DIRECCIÓN',
            'TIPO SERVICIO',
            'DETALLES CONEXIÓN',
            'PRECIO',
            'ESTADO'
        ];
    }

    /**
     * @param mixed $network
     * @return array
     */
    public function map($network): array
    {
        $conexion = '-';
        if ($network->networkable) {
            if ($network->isSatelital()) {
                $conexion = ($network->networkable->name ?? '') . ' - ' . ($network->networkable->direccion ?? '');
            } else {
                $port = $network->networkable->code ?? '';
                $box = $network->networkable->boxnav->name ?? '';
                $spliter = $network->networkable->boxnav->spliter->name ?? '';
                $olt = $network->networkable->boxnav->spliter->olt->name ?? '';
                $conexion = "Puerto: {$port} - Caja: {$box} - Spliter: {$spliter} - OLT: {$olt}";
            }
        }

        return [
            $network->code,
            $network->codigo_slp ?? '',
            formatDate($network->date, 'DD/MM/YYYY'),
            $network->client->document ?? '',
            $network->client->name ?? '',
            $network->telefono ?? '',
            $network->location ?? '',
            $network->ubigeo->departamento ?? '',
            $network->direccion ?? '',
            $network->type ?? '',
            $conexion,
            number_format($network->price, 2, '.', ''),
            $network->isSuspendido() ? 'SUSPENDIDO' : 'ACTIVO'
        ];
    }

    /**
     * @param Worksheet $sheet
     * @return array
     */
    public function styles(Worksheet $sheet)
    {
        return [
            1 => [
                'font' => ['bold' => true, 'color' => ['rgb' => 'FFFFFF']],
                'fill' => [
                    'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                    'startColor' => ['rgb' => '1F2937'] // Dark gray header background
                ]
            ],
        ];
    }
}
