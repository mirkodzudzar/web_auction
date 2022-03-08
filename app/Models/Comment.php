<?php

namespace App\Models;

use App\Scopes\NewestScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = ['text'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function commentator()
    {
        return $this->belongsTo(User::class, 'commentator_id');
    }

    public static function boot()
    {
        static::addGlobalScope(new NewestScope);

        parent::boot();
    }
}
