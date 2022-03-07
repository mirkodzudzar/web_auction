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
    // We are not saving new item yet just because we firstly need to relate categories and conditions to it.
    $item = $user->items()->make($data);
    $item->category()->associate($data['category']);
    $item->condition()->associate($data['condition']);
    // Saving new item so we are able to relate deliveries, payments and image to existing item.
    $item->save();
    
    $item->deliveries()->sync($data['deliveries']);

    // Payments are optional.
    if (isset($data['payments'])) {
        // Save payments for this item.
        $item->payments()->sync($data['payments']);
    }
    
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