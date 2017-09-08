<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\{Voucher, Transaction};

class VoucherReverted extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $voucher, $transaction;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Voucher $voucher, Transaction $transaction)
    {
        $this->voucher = $voucher;
        $this->transaction = $transaction;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.voucher.revert');
    }
}
