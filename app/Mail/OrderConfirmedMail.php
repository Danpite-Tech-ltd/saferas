<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Order;

class OrderConfirmedMail extends Mailable
{
    use Queueable, SerializesModels;

    public $confirmMail;

    public function __construct(array $confirmMail)
    {
        $this->confirmMail = $confirmMail;
    }

    public function build()
    {
        return $this->subject('Your Order is Confirmed by Greenieagro')
                    ->view('webview.email.confirm_mail');
    }
}
