<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Visit extends Model
{
    use HasFactory;

    protected $fillable = [
        'membership_id'
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
}
