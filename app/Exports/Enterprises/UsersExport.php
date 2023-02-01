<?php

namespace App\Exports\Enterprises;

use App\Models\Enterprise;
use App\Models\EnterpriseUser;
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

    private $fileName = 'Users.xlsx';
    private $enterprise;
    private $modalitie;

    public function __construct($enterprise,$modalitie){
        $this->enterprise = $enterprise;
        $this->modalitie = $modalitie;
    }

    /**
     * @return Builder
     */
    public function query() {

        if($this->modalitie=="0"){
            return EnterpriseUser::exportUsers($this->enterprise)->take(9999999);
        }elseif( $this->modalitie=="1"){
            return EnterpriseUser::exportAvailable($this->enterprise)->take(9999999);
        }elseif($this->modalitie=="2"){
            return EnterpriseUser::exportDisabled($this->enterprise)->take(9999999);
        }
    }

    /**
     * @param mixed $row
     *
     * @return array
     */
    public function map($row): array
    {
       
        $identification = $row->identification;

        if($identification!=null){
            $identification =  $row->identification;
        }else{
            $identification =  '';
        }

        return [
            $row->firstname,
            $row->lastname,
            $identification,
            $row->cellphone,
            $row->email,
            $row->address,
            humanize_date($row->created_at)
        ];
        
    }

    /**
     * @return array
     */
    public function headings(): array
    {
        return [
            'NOMBRES',
            'APELLIDOS',
            'IDENTIFICACIÓN',
            'CELULAR',
            'EMAIL',
            'DIRECCIÓN',
            'FECHA REGISTRO',
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
        
        $enterprise = Enterprise::id($this->enterprise);

        return $enterprise->title;
    }
}

