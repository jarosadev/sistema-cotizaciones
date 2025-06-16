<?php

namespace App\Models;

use App\Traits\Auditable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BillingNoteItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'billing_note_id',
        'type',
        'is_amount_parallel',
        'description',
        'amount',
        'amount_parallel',
        'currency',
        'exchange_rate',
    ];

    public function billingNote(): BelongsTo
    {
        return $this->belongsTo(BillingNote::class);
    }


}
