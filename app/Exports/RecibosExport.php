<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class RecibosExport implements FromQuery, WithHeadings, WithMapping, ShouldAutoSize, WithStyles
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
            'TELÉFONO',
            // 'FECHA REGISTRO',
            'MES PAGO',
            'FECHA VENCIMIENTO',
            'SERIE COMPLETA',
            'CLIENTE DOCUMENTO',
            'CLIENTE NOMBRE',
            'CÓDIGO SLP',
            'LUGAR',
            'TIPO SERVICIO',
            'SUBTOTAL',
            'DESCUENTO',
            'TOTAL',
            'ESTADO',
            'FECHA PAGO',
            'MÉTODO DE PAGO'
        ];
    }

    /**
     * @param mixed $recibo
     * @return array
     */
    public function map($recibo): array
    {
        return [
            $recibo->network->telefono ?? '',
            // formatDate($recibo->date, 'DD/MM/YYYY'),
            formatDate($recibo->month, 'MMMM Y'),
            formatDate($recibo->vencimiento, 'DD/MM/YYYY'),
            $recibo->seriecompleta,
            $recibo->client->document ?? '',
            $recibo->client->name ?? '',
            $recibo->network->codigo_slp ?? '',
            $recibo->network->location ?? '',
            $recibo->network->type ?? '',
            number_format($recibo->amount, 2, '.', ''),
            number_format($recibo->descuento, 2, '.', ''),
            number_format($recibo->total, 2, '.', ''),
            $recibo->payment ? 'PAGADO' : 'PENDIENTE',
            $recibo->payment ? formatDate($recibo->payment->date, 'DD/MM/YYYY HH:mm:ss') : '',
            $recibo->payment && $recibo->payment->formapay ? $recibo->payment->formapay->name : ''
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
