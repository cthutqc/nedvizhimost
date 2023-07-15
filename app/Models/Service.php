<?php

namespace App\Models;

use App\Models\Scopes\ActiveScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Service extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia, HasSlug;

    protected $guarded = ['id'];

    protected static function boot()
    {
        parent::boot();
        static::addGlobalScope(new ActiveScope());
    }

    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }

    public function faqs():BelongsToMany
    {
        return $this->belongsToMany(Faq::class);
    }

    public function service_numbers():BelongsToMany
    {
        return $this->belongsToMany(ServiceNumber::class);
    }

    public function mortgage():HasOne
    {
        return $this->hasOne(Mortgage::class);
    }

    public function service_jobs():BelongsToMany
    {
        return $this->belongsToMany(ServiceJob::class);
    }
}
