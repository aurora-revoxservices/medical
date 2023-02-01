<?php

namespace App\Exports\Managers;

use App\Models\Course;
use App\Models\EnterpriseCourse;
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

class CoursesExport implements FromQuery, Responsable, WithMapping, WithHeadings, WithColumnFormatting, WithTitle, WithStrictNullComparison
{
    use Exportable;

    private $fileName = 'Courses.xlsx';
    private $course;
    private $enterprise;
    private $modalitie;

    public function __construct($course,$enterprise,$modalitie){
        $this->modalitie = $modalitie;
        $this->course = $course;
        $this->enterprise = $enterprise;
    }

    /**
     * @return Builder
     */
    public function query() {

        if($this->modalitie=="0"){
            return EnterpriseCourse::exportUsers($this->enterprise,$this->course)->take(9999999);
        }elseif( $this->modalitie=="1"){
            return EnterpriseCourse::exportTerminated($this->enterprise,$this->course)->take(9999999);
        }elseif($this->modalitie=="2"){
            return EnterpriseCourse::exportEarring($this->enterprise,$this->course)->take(9999999);
        }
    }

    /**
     * @param mixed $row
     *
     * @return array
     */
    public function map($row): array
    {
       
        $culminated = $row->culminated;

        if($culminated==1){
            $created =  humanize_date($row->updated_at);
            $culminated =  humanize_date($row->culminated_at);
        }else{
            $created =  humanize_date($row->updated_at);
            $culminated =  'PENDIENTE';
        }

        $identification = $row->identification;

        if($identification!=null){
            $identification =  $row->identification;
        }else{
            $identification =  '';
        }


        $firstname = $row->firstname;

        if($firstname!=null){
            $firstname =  $row->firstname;
        }else{
            $firstname =  '';
        }

        $lastname = $row->lastname;

        if($lastname!=null){
            $lastname =  $row->lastname;
        }else{
            $lastname =  '';
        }


        $percent = $row->percent;

        if($percent>=100){
            $percent =  100;
        }

        return [
            $firstname,
            $lastname,
            $identification,
            $percent,
            $created,
            $culminated
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
            'PORCENTAJE',
            'FECHA INICIO',
            'FECHA CULMINACIÓN',
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
        
        $course = Course::id($this->course);

        return $course->title;
    }
}

