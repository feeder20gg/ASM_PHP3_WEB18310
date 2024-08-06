<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Bills;

class OrderMail extends Mailable
{
    use Queueable, SerializesModels;

    public $bill;

    public function __construct(Bills $bill)
    {
        $this->bill = $bill;
    }

    public function build()
    {
        return $this->view('emails.order_mail')
                    ->with([
                        'bill' => $this->bill,
                    ])
                    ->subject('Xác nhận đơn hàng');
    }

    public function attachments(): array
    {
        return [];
    }
}
