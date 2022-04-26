<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Collection;
use Laravel\Sanctum\HasApiTokens;

/**
 * @property string $role
 * @property Collection $memberships
 */
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    const ROLE_MEDIC = 'medic';
    const ROLE_PATIENT = 'patient';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * @return bool
     */
    public function isMedic(): bool
    {
        return $this->role == self::ROLE_MEDIC;
    }

    /**
     * @return bool
     */
    public function isPatient(): bool
    {
        return $this->role == self::ROLE_PATIENT;
    }

    /**
     * @return HasMany
     */
    public function patientMedicMemberships(): HasMany
    {
        return $this->hasMany(Membership::class, 'patient_id');
    }

    /**
     * @return HasMany
     */
    public function medicPatientMemberships(): HasMany
    {
        return $this->hasMany(Membership::class, 'medic_id');
    }

    /**
     * @return HasMany|null
     */
    public function memberships()
    {
        if ($this->isMedic()) {
            return $this->medicPatientMemberships();
        } else if ($this->isPatient()) {
            return $this->patientMedicMemberships();
        }

        return null;
    }
}
