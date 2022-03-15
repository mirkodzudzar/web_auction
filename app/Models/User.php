<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getFullNameAttribute()
    {
        return $this->first_name . " " . $this->last_name;
    }

    public function items()
    {
        return $this->hasMany(Item::class, 'user_id');
    }

    public function buyerItems()
    {
        return $this->hasMany(Item::class, 'buyer_id');
    }

    public function bidItems()
    {
        return $this->belongsToMany(Item::class)
                    ->withTimestamps()
                    ->withPivot(['price', 'status_id'])
                    ->using(ItemUser::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function commentator()
    {
        return $this->hasOne(User::class, 'commentator_id');
    }
}
