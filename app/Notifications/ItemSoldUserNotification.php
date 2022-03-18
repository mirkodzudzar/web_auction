<?php

namespace App\Notifications;

use App\Models\Item;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ItemSoldUserNotification extends Notification
{
    use Queueable;

    public $item;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Item $item)
    {
        $this->item = $item;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail', 'database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage())->subject("Your item '{$this->item->name}' has been sold")
                                  ->greeting("Item '{$this->item->name}' has been sold!")
                                  ->line("Buyer is {$this->item->buyer->full_name }, with the final price of {$this->item->final_price } RSD.")
                                  ->line("Starting price was {$this->item->starting_price } RSD.")
                                  ->action('See item details', route('items.show', ['item' => $this->item->id]))
                                  ->line("Contact the buyer on email: {$this->item->buyer->email }")
                                  ->line('Thank you for using our application!');
    }

    /**
     * Get the database representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toDatabase($notifiable)
    {
        return [
            'item_id' => $this->item->id,
            'name' => $this->item->name,
            'status' => $this->item->status->name,
        ];
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
