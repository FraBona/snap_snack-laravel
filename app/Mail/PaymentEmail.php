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

    public $customer_address;

    public function __construct($restaurantName, $orderTotal, $customer_address){
        $this->restaurantName = $restaurantName;
        $this->orderTotal = $orderTotal;
        $this->customer_address = $customer_address;
    }
    public function build()
    {
        return $this->subject('Payment Done')
                    ->view('admin.emails.html-notification');
    }
}
