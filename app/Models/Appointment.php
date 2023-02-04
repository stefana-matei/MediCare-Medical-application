<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Appointment extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'appointments';

    protected $fillable = [
        'membership_id',
        'confirmed',
        'honored',
        'date'
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


    public function getStatusAttribute()
    {
        return match ($this->confirmed) {
            null => [
                'color' => 'orange',
                'text' => 'În așteptare'
            ],
            0 => [
                'color' => 'red',
                'text' => 'Refuzată'
            ],
            1 => [
                'color' => 'green',
                'text' => 'Confirmată'
            ],
            default => [
                'color' => 'red',
                'text' => 'Stare nedefinită'
            ],
        };
    }

}
