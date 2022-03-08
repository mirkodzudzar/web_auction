<?php

namespace App\Mail;

use App\Models\Item;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ItemBought extends Mailable
{
    use Queueable, SerializesModels;

    public $item;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Item $item)
    {
        $this->item = $item;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $subject = "You have bought item '{$this->item->name}'";
     
        return $this->subject($subject)
                    ->markdown('emails.item-bought');
    }
}
