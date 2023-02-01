<?php

namespace App\Exports;

use Carbon\Carbon;
use App\Models\Newsletter;
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

class NewslettersExport implements FromQuery, Responsable, WithMapping, WithHeadings, WithColumnFormatting, WithTitle, WithStrictNullComparison
{
    use Exportable;

    private $fileName = 'Newsletters.xlsx';

    public function __construct(){

    }

    /**
     * @return Builder
     */
    public function query() {
        return Newsletter::take(10);
    }

    /**
     * @param mixed $row
     *
     * @return array
     */
    public function map($row): array
    {
        return [
            $row->email,
        ];
    }

    /**
     * @return array
     */
    public function headings(): array
    {
        return [
            'EMAIL',
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
        return 'Newsletters';
    }
}

