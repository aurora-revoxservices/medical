<?php

namespace App\Mail\Orders;

use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Storage;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use Illuminate\Mail\Mailable;
use Illuminate\Http\File;

class ApprovedMails extends Mailable
{
    use Dispatchable,  InteractsWithQueue, SerializesModels;

    public $order;
    public $token;
    public $email;
    public $firstname;
    public $lastname;
    public $payment;
    public $method;
    public $total;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($order)
    {
        $this->order = $order->order;
        $this->token = $order->token;
        $this->email = $order->user->email;
        $this->firstname = $order->user->firstname;
        $this->lastname = $order->user->lastname;
        $this->payment = humanize_date($order->payment_at);
        $this->method = $order->method->title;
        $this->total = $order->total;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
   public function build()
   {
        return $this->subject("BPM - PAGO APROBADO")
                    //->to($this->email)
                    ->to('revoxservices@gmail.com')
                    ->markdown('mailers.orders.approved')
                    ->with([
                        'token' => $this->token,
                        'email' => $this->email,
                        'firstname' => $this->firstname,
                        'lastname' => $this->lastname,
                        'payment' => $this->payment,
                        'method' => $this->method,
                        'total' => $this->total,
        ]);

    }

}
