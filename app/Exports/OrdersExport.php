<?php

namespace App\Exports;

use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Database\Query\Builder;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStrictNullComparison;
use Maatwebsite\Excel\Concerns\WithTitle;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;

class OrdersExport implements FromQuery, Responsable, WithMapping, WithHeadings, WithColumnFormatting, WithTitle, WithStrictNullComparison
{
    use Exportable;

    private $fileName = 'Ordenes.xlsx';

    public function __construct(){

    }

    /**
     * @return Builder
     */
    public function query() {
        return Order::take(10)->conditions();
    }

    /**
     * @param mixed $row
     *
     * @return array
     */
    public function map($row): array
    {
        return [
            $row->token,
            $row->condition,
            $row->transaction,
            $row->method,
            $row->user->firstname ." ". $row->user->lastname,
            $row->subtotal,
            $row->discount,
            $row->total,
        ];
    }

    /**
     * @return array
     */
    public function headings(): array
    {
        return [
            'TOKEN',
            'CONDICION',
            'SEGUIMIENTO',
            'METODO',
            'CLIENTE',
            'SUBTOTAL',
            'DESCUENTO',
            'TOTAL',
        ];
    }

    /**
     * @return array
     */
    public function columnFormats(): array
    {
        return [
        ];
    }

    /**
     * @return string
     */
    public function title(): string
    {
        return 'Reporte de usuarios';
    }
}

