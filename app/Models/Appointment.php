<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = [
        'membership_id'
    ];

    protected $dates = [
        'date'
    ];

    protected $casts = [
        'honored' => 'boolean'
    ];


    public function membership(): BelongsTo
    {
        return $this->belongsTo(Membership::class);
    }


    public function visit(): HasOne
    {
        return $this->hasOne(Visit::class);
    }


}
