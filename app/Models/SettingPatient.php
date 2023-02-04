<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SettingPatient extends Model
{
    use HasFactory;

    protected $table = 'settings_patient';

    protected $dates = [
        'birthday'
    ];

    protected $fillable = [
        'pin',
        'birthday',
        'gender',
        'country',
        'county',
        'city',
        'address',
        'phone',
    ];

}
