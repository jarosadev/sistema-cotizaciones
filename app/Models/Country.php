<?php

namespace App\Models;

use App\Traits\Auditable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Country extends Model
{


    use HasFactory, SoftDeletes, Auditable;

    protected $fillable = ['name', 'code', 'continent_id'];

    public function continent(): BelongsTo
    {
        return $this->belongsTo(Continent::class);
    }

    public function cities(): HasMany
    {
        return $this->hasMany(City::class);
    }

    public $timestamps = true;
}
