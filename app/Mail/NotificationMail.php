<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Order;

class NotificationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $confirmMail;

    /**
     * Create a new message instance.
     */
    public function __construct(array $confirmMail)
    {
        $this->confirmMail = $confirmMail;
    }

    public function build()
    {
          return $this->subject( 'A new order has arrived on your website. Please Check')->view('webview.email.success_mail');
    }
}
