<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
    use HasFactory;

    protected $fillable = [
        'medical_history',
        'symptoms',
        'diagnosis',
        'clinical_data',
        'para_clinical_data',
        'referral',
        'indications',
        'date_processed'
    ];

    protected $casts = [
        'referral' => 'boolean'
    ];

    protected $dates = [
        'date_processed'
    ];

    public function visit()
    {
        return $this->belongsTo(Visit::class);
    }
}
