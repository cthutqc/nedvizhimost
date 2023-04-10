<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Arr;
use LamaLama\Wishlist\Wishlistable;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Builder;

class Item extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia, HasSlug, Wishlistable;

    protected $guarded = ['id'];

    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }

    public function category():BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function getFormattedPriceAttribute():string
    {
        return number_format($this->attributes['price'] / 100, 0, ' ' , ' ') . ' ₽';
    }

    public function deal_type():BelongsTo
    {
        return $this->belongsTo(DealType::class);
    }

    public function scopeGetItems(Builder $query, $amount = null, $selected = null): void
    {
        $query->when($amount, function ($q) use ($amount) {
                $q->take($amount);
            })
            ->when(isset($selected['category']), function ($q) use ($selected) {
                $q->where('category_id', $selected['category']['id'])
                    ->orderBy('price');
            }, function ($q){
                $q->orderBy('created_at');
            })
            ->when(isset($selected['rooms']), function($q) use($selected){
                $q->whereIn('rooms', $selected['rooms']);
            })
            ->select('id', 'name', 'user_id', 'price', 'address', 'slug', 'total_area', 'floor', 'floors', 'rooms')
            ->with(['media', 'user:id,phone']);
    }
}
