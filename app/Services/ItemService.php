<?php

namespace App\Services;

use App\Models\Item;
use App\Models\User;
use App\Models\Image;
use Illuminate\Support\Facades\Auth;

class ItemService
{
  public static function store(array $data) : Item
  {
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