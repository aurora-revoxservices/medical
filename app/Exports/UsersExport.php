<?php

namespace App\Exports;

use App\Models\User;
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

class UsersExport implements FromQuery, Responsable, WithMapping, WithHeadings, WithColumnFormatting, WithTitle, WithStrictNullComparison
{
    use Exportable;

    private $fileName = 'Usuarios.xlsx';

    public function __construct(){

    }

    /**
     * @return Builder
     */
    public function query() {
        return User::take(10)->conditions();
    }

    /**
     * @param mixed $row
     *
     * @return array
     */
    public function map($row): array
    {
        return [
            $row->names,
            $row->cellphone,
            $row->email,
            $row->profile->title,
            $row->faculty->title,
        ];
    }

    /**
     * @return array
     */
    public function headings(): array
    {
        return [
            'NOMBRES',
            'CELULAR',
            'EMAIL',
            'PERFIL',
            'FACULTAD',
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

