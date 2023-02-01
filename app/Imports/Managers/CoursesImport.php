<?php

namespace App\Imports\Managers;

use App\Models\Utilities;
use App\Models\User;
use App\Models\Enterprise;
use App\Models\EnterpriseUser;
use Illuminate\Support\Str;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\RegistersEventListeners;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Events\AfterImport;
use Maatwebsite\Excel\Validators\Failure;
use Throwable;


use App\Models\CourseUser;
use App\Models\Condition;
use App\Models\Course;
use App\Models\Order;
use App\Models\Method;
use Carbon\Carbon;

class CoursesImport implements ToCollection, WithHeadingRow
{

    use Importable, RegistersEventListeners;

    public $enterprise;
    public $course;

    public function __construct($enterprise,$course)
    {
        $this->enterprise = $enterprise;
        $this->course = $course;
    }
    

    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {

            $enterprise = Enterprise::token($this->enterprise);
            $course = Course::token($this->course);

            $users = EnterpriseUser::users($enterprise->id);

            if(count($users)>0){
                    
                $identification = $row['identification'];
                $user = User::identification($identification);

                $validate = EnterpriseUser::validates($user->id);

                if(count($validate)>0){
                        
                    $condition =  Condition::slug('pagada');
                    $method =  Method::slug('acuerdo');
                    $date = new Carbon;
        
                    $order = new Order();
                    $order->token = Order::generate();
                    $order->subtotal = 0;;
                    $order->discount = 0;
                    $order->total = 0;;
                    $order->transaction = null;
                    $order->condition_id = $condition->id;
                    $order->method_id = $method->id;
                    $order->course_id = $course->id;
                    $order->user_id = $user->id;
                    $order->enroll_start = Utilities::validateDates($date->format('d-m-Y'));
                    $order->enroll_expire = Utilities::validateDateYears($date->format('d-m-Y'));
                    $order->created_at = new \DateTime();
                    $order->updated_at = new \DateTime();
                    $order->save();
        
                    $include = new CourseUser();
                    $include->user_id  = $user->id;
                    $include->course_id  = $course->id;
                    $include->order_id  = $order->id;
                    $include->culminated  = 0;
                    $include->culminated_at  = null;
                    $include->created_at = new \DateTime();
                    $include->updated_at = new \DateTime();
                    $include->save();

                }
                
            }

        }
    }
    public function chunkSize(): int
    {
        return 1000;
    }

    
    public function headingRow(): int
    {
        return 1;
    }

}
