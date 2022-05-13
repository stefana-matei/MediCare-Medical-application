<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Specialty extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];


    /**
     * @return HasMany
     */
    public function medics(): HasMany
    {
        return $this->hasMany(User::class);
    }


}
