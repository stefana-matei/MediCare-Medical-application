<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Membership extends Model
{
    use HasFactory;

    const KEY_MEDIC = 'medic_id';
    const KEY_PATIENT = 'patient_id';

    protected $table = 'memberships';

    protected $fillable = [
        'id',
        'medic_id',
        'patient_id'
    ];


    public function medic()
    {
        return $this->belongsTo(User::class, self::KEY_MEDIC);
    }


    public function patient()
    {
        return $this->belongsTo(User::class, self::KEY_PATIENT);
    }


    public function visits(): HasMany
    {
        return $this->hasMany(Visit::class);
    }


    public function appointments(): HasMany
    {
        return $this->hasMany(Appointment::class);
    }
}
