<?php

namespace App\Models;

use App\Traits\Statusable;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ItemUser extends Pivot
{
    use HasFactory,
        Statusable; // use Trait to extend Status relationship
}
