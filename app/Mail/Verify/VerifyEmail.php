<?php

namespace App\Mail\Verify;

use App\Models\Reservation;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class VerifyEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $url;
    public $firstname;
    public $lastname;
    public $user;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user , $url)
    {
        $this->user = $user;
        $this->firstname = $user->lastname;
        $this->lastname = $user->lastname;
        $this->url = $url;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
   public function build()
   {
        $this->subject("Verificación de Correo – SpeakersMarket")
        ->from('SpeakersMarket', config('app.name', 'SpeakersMarket'))
        ->to($this->user->email)
        ->markdown('mailers.passwords.reset')
        ->with([
            'firstname' => $this->user->firstname,
            'lastname' => $this->user->lastname,
            'username' => $this->username,
            'url' =>  $this->url,
        ]);
    }


}
