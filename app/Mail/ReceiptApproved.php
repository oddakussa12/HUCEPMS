<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ReceiptApproved extends Mailable
{
    use Queueable, SerializesModels;

    public $detail;
    public function __construct($detail)
    {
        $this->detail = $detail;
    }


    /**
     * Build the message.
     *
     * @return $this
     */
    // public function build()
    // {
    //     return $this->markdown('emails.receiptApproved');
    // }
    public function build()
    {
        return $this->markdown('emails.receiptApproved')
                    ->with('detail', $this->detail);
    }
}
