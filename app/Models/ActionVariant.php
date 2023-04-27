<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class ActionVariant extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $guarded = ['id'];

    public function actions():BelongsToMany
    {
        return $this->belongsToMany(Action::class);
    }
}
