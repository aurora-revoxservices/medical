<?php

namespace App\Mail\Password;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;



class ResetPassword extends Mailable
{
    use Queueable, SerializesModels;

    public $email;
    public $url;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($email , $url)
    {
        $this->email = $email;
        $this->url = $url;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
   public function build()
   {

        $this->subject("Restablecer contraseña – BPM")
                    ->to($this->email)
                    ->markdown('mailers.passwords.reset')
                    ->with([
                        'email' => $this->email,
                        'verifyUrl' =>  $this->url,
        ]);



    }


}
