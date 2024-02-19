<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class PaymentEmail extends Mailable
{
    use Queueable, SerializesModels;
    public $restaurantName;
    public $orderTotal;

    public function __construct($restaurantName, $orderTotal){
        $this->restaurantName = $restaurantName;
        $this->orderTotal = $orderTotal;
    }
    public function build()
    {
        return $this->subject('Payment Done')
                    ->view('admin.emails.html-notification');
    }
}
