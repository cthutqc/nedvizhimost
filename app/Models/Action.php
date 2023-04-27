<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Action extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function action_variants():BelongsToMany
    {
        return $this->belongsToMany(ActionVariant::class);
    }
}
