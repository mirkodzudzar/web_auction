<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Status extends Model
{
    use HasFactory;

    public const ACTIVE = 1;
    public const CANCELED = 2;
    public const EXPIRED = 3;
    public const SOLD = 4;

    public function items()
    {
        return $this->hasMany(Item::class);
    }

    public function isActive()
    {
        return ($this->id === self::ACTIVE) ? true : false;
    }

    public function isSold()
    {
        return ($this->id === self::SOLD) ? true : false;
    }
}
