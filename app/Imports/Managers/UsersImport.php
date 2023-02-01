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

class UsersImport implements
    ToCollection,
    WithHeadingRow,
    WithValidation
{

    use Importable, RegistersEventListeners;

    public $token;

    public function __construct($enterprise)
    {
        $this->token = $enterprise;
    }


    public function rules(): array
    {
        return [
            '*.email' => ['email', 'unique:users,email'],
            '*.identification' => ['unique:users,identification']
        ];
    }


    public function customValidationMessages()
    {
        return [

            '*.email.required'    => 'Email requerido!',
            '*.email.email'       => 'Email incorrecto!',
            '*.email.unique'      => 'Email repetido',

            '*.identification.required'    => 'Identificacion requerido!',
            '*.identification.unique'      => 'Identificacion repetida',


        ];
    }



    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {

            $enterprise = Enterprise::token($this->token);

            $user = new User;
            $user->token = User::generate();
            $user->firstname = $row['firstname'];
            $user->lastname = $row['lastname'];
            $user->cellphone = $row['cellphone'];
            $user->identification = $row['identification'];
            $user->address = $row['address'];
            $user->email = $row['email'];
            $user->password = $row['password'];
            $user->terms = 1;
            $user->available = 1;
            $user->validation = 0;
            $user->validation = 0;
            $user->setting = 0;
            $user->role = 'customer';
            $user->remember_token = Str::random(60);
            $user->email_verified_at = new \DateTime();
            $user->created_at = new \DateTime();
            $user->updated_at = new \DateTime();
            $user->save();

            $inscription = new EnterpriseUser;
            $inscription->user_id = $user->id;
            $inscription->enterprise_id = $enterprise->id;
            $inscription->available = 1;
            $inscription->created_at = new \DateTime();
            $inscription->updated_at = new \DateTime();
            $inscription->save();
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
