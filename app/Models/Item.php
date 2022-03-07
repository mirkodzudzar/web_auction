<?php

namespace App\Models;

use Carbon\Carbon;
use App\Scopes\NewestScope;
use Illuminate\Database\Eloquent\Builder;
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
     * Only name and description, payment and delivery will be searchable for items,
     * first_name, last_name and email will be searchable for item related user,
     * and even full_name that we are getting as a concatenation of two fields...
     */
    public function toSearchableArray()
    {
        $array = $this->toArray();

        $array['item'] = $this->only('name', 'description');

        // Too many queries...
        $array['item_payments'] = $this->payments->map(function ($array) {
            return $array['name'];
        })->toArray();
        // Too many queries...
        $array['item_deliveries'] = $this->deliveries->map(function ($array) {
            return $array['name'];
        })->toArray();
        // Too many queries...
        $array['item_user'] = $this->user->only('full_name', 'first_name', 'last_name', 'email');

        return $array;
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function buyer()
    {
        return $this->belongsTo(User::class, 'buyer_id');
    }

    public function bidUsers()
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
        return $this->belongsToMany(Delivery::class)->withTimestamps();
    }

    public function payments()
    {
        return $this->belongsToMany(Payment::class)->withTimestamps();
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function condition()
    {
        return $this->belongsTo(Condition::class);
    }

    public function scopeOnlyActiveItems(Builder $builder)
    {
        return $builder->whereDate('expires_at', '>', Carbon::now())
                       ->where('status', '=', 'active');
    }

    public function isExpired()
    {
        if (Carbon::parse($this->expires_at) <= Carbon::now()) {
            return true;
        }

        return false;
    }

    public function scopeWithImageAndBidUsersCount(Builder $builder)
    {
        return $builder->with('image')
                       ->withCount('bidUsers');
    }

    public static function boot()
    {
        static::addGlobalScope(new NewestScope);

        parent::boot();
    }
}
