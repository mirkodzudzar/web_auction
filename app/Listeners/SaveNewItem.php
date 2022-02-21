<?php

namespace App\Listeners;

use App\Models\User;
use App\Models\Image;
use Illuminate\Support\Facades\Auth;

class SaveNewItem
{
    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        $data = $event->data;

        $user = User::findOrFail(Auth::user()->id);
        $item = $user->items()->make($data);
        $item->category()->associate($data['category']);
        $item->save();
        
        // Payments are optional.
        if (isset($data['payments'])) {
            // Save payments for this item.
            $item->payments()->sync($data['payments']);
        }
        
        // Save deliveries for this item.
        $item->deliveries()->sync($data['deliveries']);

        // Image file is optional.
        if (isset($data['image'])) {
            $path = $data['image']->store('images');
            $item->image()->save(
                Image::make(['path' => $path])
            );
        }

        return $item;
    }
}
