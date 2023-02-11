<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Visit extends Model
{
    use HasFactory;

    protected $table = 'visits';

    protected $fillable = [
        'membership_id',
        'date'
    ];

    protected $dates = [
        'date'
    ];


    public function record()
    {
        return $this->hasOne(Record::class);
    }


    public function membership(): BelongsTo
    {
        return $this->belongsTo(Membership::class);
    }


    public function appointment(): BelongsTo
    {
        return $this->belongsTo(Appointment::class);
    }
}
