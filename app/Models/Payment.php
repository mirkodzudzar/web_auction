<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    public function items()
    {
        return $this->belongsToMany(Item::class)->withTimestamps();
    }
}
