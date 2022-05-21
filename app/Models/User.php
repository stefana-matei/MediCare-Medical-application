<?php

namespace App\Models;

use Exception;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Collection;
use Laravel\Sanctum\HasApiTokens;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

/**
 * @property string $role
 * @property Collection $memberships
 */
class User extends Authenticatable implements HasMedia
{
    use HasApiTokens, HasFactory, Notifiable, InteractsWithMedia;

    const ROLE_MEDIC = 'medic';
    const ROLE_PATIENT = 'patient';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'firstname',
        'lastname',
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
     * @return string
     */
    public function getOtherMemberKey()
    {
        return $this->isMedic() ? 'patient_id' : 'medic_id';
    }

    /**
     * @return string
     */
    public function getMemberKey()
    {
        return $this->isMedic() ? 'medic_id' : 'patient_id';
    }


    /**
     * @return HasMany|null
     */
    public function memberships()
    {
        return $this->hasMany(Membership::class, $this->getMemberKey());
    }


    /**
     * @return HasManyThrough
     */
    public function visits()
    {
        return $this->hasManyThrough(Visit::class, Membership::class, $this->getMemberKey());
    }


    /**
     * @return HasManyThrough
     */
    public function appointments(): HasManyThrough
    {
        return $this->hasManyThrough(Appointment::class, Membership::class, $this->getMemberKey());
    }


    /**
     * @return HasOne
     */
    public function settingsMedic(): HasOne
    {
        return $this->hasOne(SettingMedic::class);
    }

    /**
     * @return HasOne
     */
    public function settingsPatient(): HasOne
    {
        return $this->hasOne(SettingPatient::class);
    }

    /**
     * @return null
     */
    public function getSpecialtyAttribute()
    {
        if(is_null($this->settingsMedic)) {
            return null;
        }

        return $this->settingsMedic->specialty;
    }

    /**
     * @return string
     */
    public function getAvatarAttribute()
    {
        $avatar = $this->getMedia('avatars')->last();

        if(!is_null($avatar)) {
            return asset($this->getMedia('avatars')->last()->getUrl());
        }else{
            return 'https://ui-avatars.com/api?background=random&name=' . $this->name;
        }

    }

    /**
     * Getter for name. Built from firstname and lastname.
     *
     * @return string
     */
    public function getNameAttribute()
    {
        return $this->firstname . ' ' . $this->lastname;
    }
}
