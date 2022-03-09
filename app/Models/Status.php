<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
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

    public function itemUsers()
    {
        return $this->hasMany(ItemUser::class);
    }

    public function scopeActive(Builder $builder)
    {
        return $builder->where('name', 'Active');
    }

    public function scopeCanceled(Builder $builder)
    {
        return $builder->where('name', 'Canceled');
    }

    public function scopeExpired(Builder $builder)
    {
        return $builder->where('name', 'Expired');
    }

    public function scopeSold(Builder $builder)
    {
        return $builder->where('name', 'Sold');
    }
}
