<?php

namespace Database\Seeders;

use App\Models\Membership;
use App\Models\User;
use App\Models\Visit;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        /** @var User $medic */
        $medic = User::factory()->create([
            'role' => 'medic',
            'name' => 'Medic 1',
            'email' => 'medic_1@med.com'
        ]);

        /** @var User $patient */
        $patient = User::factory()->create([
            'role' => 'patient',
            'name' => 'Patient 1',
            'email' => 'patient_1@pat.com'
        ]);

        /** @var Membership $membership */
        $membership = $medic->memberships()->create([
            'patient_id' => $patient->id
        ]);

        $visit = $membership->visits()->create([
            'date' => now()
        ]);

        dd(Visit::first()->date, Visit::first()->created_at);
    }
}
