<?php

namespace App\Services;

use App\Models\Item;
use App\Models\User;
use App\Models\Image;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image as InterventionImage;

class ItemService
{
  public function store(array $data) : Item
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
      // Storing original image
      $image = $data['image'];
      $imageName = uniqid($item->id . "_") . "." . $image->getClientOriginalExtension();
      Storage::put($imageName, File::get($image));
      $item->image()->save(
        Image::make([
          'path' => $imageName,
        ]),
      );

      // Creating thumbnail image into storage
      $thumbnail = InterventionImage::make($image);
      $thumbnail->fit(150);
      $thumbnailJpg = (string) $thumbnail->encode('jpg');
      $thumbnailName = pathinfo($imageName, PATHINFO_FILENAME) . '-thumbnail.jpg';
      Storage::put($thumbnailName, $thumbnailJpg);
    }

    return $item;
  }
}