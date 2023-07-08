<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Mortgage extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function mortgage_conditions():BelongsToMany
    {
        return $this->belongsToMany(MortgageCondition::class);
    }

    public function mortgage_realties():BelongsToMany
    {
        return $this->belongsToMany(MortgageRealty::class);
    }

    public function service():BelongsTo
    {
        return $this->belongsTo(Service::class);
    }
}
