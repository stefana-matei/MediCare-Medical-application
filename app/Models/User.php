<?php

namespace App\Models;

use Exception;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Image\Exceptions\InvalidManipulation;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

/**
 * User model
 *
 * @property string $firstname
 * @property string $lastname
 * @property string $email
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
     * Filters the results by role: medic
     *
     * @param  Builder  $query
     * @return Builder
     */
    public function scopeMedic($query)
    {
        return $query->where('role', self::ROLE_MEDIC);
    }


    /**
     * Filters the results by role: patient
     *
     * @param  Builder  $query
     * @return Builder
     */
    public function scopePatient($query)
    {
        return $query->where('role', self::ROLE_PATIENT);
    }


    /**
     * Checks if the user is a medic
     *
     * @return bool
     */
    public function isMedic(): bool
    {
        return $this->role == self::ROLE_MEDIC;
    }


    /**
     * Checks if the user is a patient
     *
     * @return bool
     */
    public function isPatient(): bool
    {
        return $this->role == self::ROLE_PATIENT;
    }


    /**
     * Checks the user role and returns the other role's foreign key
     *
     * @return string
     */
    public function getOtherMemberKey()
    {
        return $this->isMedic() ? 'patient_id' : 'medic_id';
    }


    /**
     * Checks the user role and returns its own foreign key
     *
     * @return string
     */
    public function getMemberKey()
    {
        return $this->isMedic() ? 'medic_id' : 'patient_id';
    }


    /**
     * Memberships relationship
     * One-to-Many relationship. One [User] has many [Memberships].
     * [Membership] model act like a pivot table where users can be both medics or patients.
     *
     * @return HasMany|null
     */
    public function memberships()
    {
        return $this->hasMany(Membership::class, $this->getMemberKey());
    }


    /**
     * Visits relationship
     * One-to-Many through another One-to-Many relationship.
     * One [User] has many [Memberships] which have many [Visits].
     *
     * @return HasManyThrough
     */
    public function visits()
    {
        return $this->hasManyThrough(Visit::class, Membership::class, $this->getMemberKey());
    }


    /**
     * Appointments relationship
     * One-to-Many through another One-to-Many relationship.
     * One [User] has many [Memberships] which have many [Appointments].
     *
     * @return HasManyThrough
     */
    public function appointments(): HasManyThrough
    {
        return $this->hasManyThrough(Appointment::class, Membership::class, $this->getMemberKey());
    }


    /**
     * Services relationship
     * Many-to-Many through the pivot table: service_user
     *
     * @return BelongsToMany
     */
    public function services()
    {
        return $this->belongsToMany(Service::class)->withTimestamps();
    }


    /**
     * SettingsMedic relationship
     * One-to-One relationship
     * One [User] of role: medic has one [SettingMedic]
     *
     * @return HasOne
     */
    public function settingsMedic(): HasOne
    {
        return $this->hasOne(SettingMedic::class);
    }


    /**
     * SettingsPatient relationship
     * One-to-One relationship
     * One [User] of role: patient has one [SettingPatient]
     *
     * @return HasOne
     */
    public function settingsPatient(): HasOne
    {
        return $this->hasOne(SettingPatient::class);
    }


    /**
     * Accessor for 'specialty' attribute
     *
     * @return null
     */
    public function getSpecialtyAttribute()
    {
        if (is_null($this->settingsMedic)) {
            return null;
        }

        return $this->settingsMedic->specialty;
    }


    /**
     * Accessor for 'level' attribute
     *
     * @return null
     */
    public function getLevelAttribute()
    {
        if (is_null($this->settingsMedic)) {
            return null;
        }

        return $this->settingsMedic->level;
    }


    /**
     * Accessor for 'avatar' attribute
     * Retrieves the avatar image url or provides a default
     *
     * @return string
     */
    public function getAvatarAttribute()
    {
        $avatar = $this->getMedia('avatars')->last();

        if (!is_null($avatar)) {
            return asset($avatar->getUrl('thumb'));
        } else {
            return 'https://ui-avatars.com/api?background=random&name=' . $this->name;
        }

    }


    /**
     * Accessor for 'name' attribute
     * Built from firstname and lastname.
     * If the user did not configure his account yet - the email is returned instead.
     *
     * @return string
     */
    public function getNameAttribute()
    {
        if (is_null($this->firstname) && is_null($this->lastname)) {
            return $this->email;
        }

        return $this->firstname . ' ' . $this->lastname;
    }

    /**
     * Accessor for 'age' attribute
     * Built from the birthday
     *
     * @return int
     */
    public function getPatientAgeAttribute()
    {
        /** @var Carbon $birthday */
        $birthday = $this->settingsPatient->birthday;

        return $birthday->age;
    }


    public function getMedicNameAttribute()
    {
        return 'Dr. ' . $this->name;
    }


    /**
     * Registers media conversions
     * Adjusts image sizes to facilitate their storage and display
     * Implements method from HasMedia interface
     *
     * @param Media|null $media
     * @return void
     * @throws InvalidManipulation
     */
    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')
            ->fit(Manipulations::FIT_CONTAIN, 400, 400)
            ->crop(Manipulations::CROP_TOP, 400, 400);
    }

}
