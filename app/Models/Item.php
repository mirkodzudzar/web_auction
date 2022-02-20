<?php

namespace App\Models;

use App\Scopes\NewestScope;
use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Item extends Model
{
    use HasFactory,
        Searchable;

    protected $fillable = [
        'name',
        'description',
        'starting_price',
        'payment_method',
        'delivery_method',
    ];

    /**
     * Only name and description, payment and delivery methodes will be searchable for items,
     * first_name, last_name and email will be searchable for item related user,
     * and even full_name that we are getting as a concatenation of two fields...
     */
    public function toSearchableArray()
    {
        $searchable_item = $this->only('name', 'description', 'payment_method', 'delivery_method');
        $searchable_related_user = $this->user->only('full_name', 'first_name', 'last_name', 'email');

        return array_merge($searchable_item, $searchable_related_user);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function buyer()
    {
        return $this->belongsTo(User::class, 'buyer_id');
    }

    public function bid_users()
    {
        return $this->belongsToMany(User::class)
                    ->withPivot(['price', 'status']);
    }

    public function image()
    {
        return $this->hasOne(Image::class);
    }

    public function deliveries()
    {
        return $this->belongsToMany(Delivery::class);
    }

    public function payments()
    {
        return $this->belongsToMany(Payment::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public static function boot()
    {
        static::addGlobalScope(new NewestScope);

        parent::boot();
    }
}
