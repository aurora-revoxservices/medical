<?php

namespace App\Exports\Enterprises;

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
use App\Models\ExamAnswer;
use App\Models\ExamQuestion;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;

class ResultsExport implements FromQuery, Responsable, WithMapping, WithHeadings, WithColumnFormatting, WithTitle, WithStrictNullComparison
{
    use Exportable;

    private $fileName = 'Resultados.xlsx';
    private $exam;

    public function __construct($exam){
        $this->exam = $exam;
    }

    /**
     * @return Builder
     */
    public function query() {
        return ExamAnswer::where('exam_id', $this->exam->id)->take(9999999);
    }

    /**
     * @param mixed $row
     *
     * @return array
     */
    public function map($row): array
    {
        $questions = ExamQuestion::id($row->question_id);

        $user_answer = $row->user_answer;
        $answer = $row->answer;

        $result = $row->approved;

        if($result==1){
            $result =  'Correcto';
        }else{
            $result =  'Incorrecto';
        }

        return [
            $questions->question,
            $user_answer,
            $answer,
            $result,
        ];
        
    }

    /**
     * @return array
     */
    public function headings(): array
    {
        return [
            'PREGUNTA',
            'RESPUESTA USUARIO',
            'RESPUESTA',
            'ESTADO',
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
        

        return 'Resultado';
    }
}

