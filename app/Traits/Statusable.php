<?php

namespace App\Traits;

use App\Models\Status;
use Illuminate\Database\Eloquent\Builder;

trait Statusable
{
  public function status()
  {
      return $this->belongsTo(Status::class);
  }

  public function scopeActive(Builder $builder)
  {
      return $builder->where('status_id', Status::ACTIVE);
  }
}