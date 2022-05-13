<?php

namespace App\Models;

use Exception;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $guarded = [];


    /**
     * @param string $role
     * @return Setting
     * @throws Exception
     */
    public function for(string $role): Setting
    {
        switch ($role) {
            case User::ROLE_MEDIC:
                $this->setTable('settings_medic');
                break;

            case User::ROLE_PATIENT:
                $this->setTable('settings_patient');
                break;

            default:
                throw new Exception('No role was set!');
        }

        return $this;
    }

    public function specialty()
    {
        return $this->belongsTo(Specialty::class);
    }
}
