<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
    use HasFactory;


    public function diagnostic()
    {
        return $this->hasOne(Diagnostic::class);
    }

    public function visit()
    {
        return $this->belongsTo(Visit::class);
    }
}
