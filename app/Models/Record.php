<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Record extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

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

    public function getFilesAttribute()
    {
        return $this->getMedia('files');
    }
}
