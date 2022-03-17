<?php

namespace App\Traits;

use App\Models\Status;
use Illuminate\Database\Eloquent\Builder;

trait Statusable
{
    public static $active = 1;
    public static $canceled = 2;

    public static function bootStatusable()
    {
        static::creating(function($model) {
            $model->status()->associate(self::$active);
        });
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    public function isActive()
    {
        return ($this->status->id === self::$active) ? true : false;
    }

    public function isCanceled()
    {
        return ($this->status->id === self::$canceled) ? true : false;
    }

    public function scopeActive(Builder $builder)
    {
        return $builder->where('status_id', self::$active);
    }
}