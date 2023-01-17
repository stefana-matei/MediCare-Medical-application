<?php

namespace Database\Seeders;

use App\Models\Membership;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class MedicPOVSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /** @var User $medic */
        $medic = User::find(1);

        $patientS = User::find(7);

        /** @var User $patientA */
        $patientA = User::factory()->create([
            'role' => 'patient',
            'firstname' => 'Andromeda',
            'lastname' => 'Gheorghescu',
            'email' => 'andromeda.gheorghescu@medicare.com',
            'password' => Hash::make('secret123')
        ]);

        /** @var User $patientB */
        $patientB = User::factory()->create([
            'role' => 'patient',
            'firstname' => 'Beatrice',
            'lastname' => 'Ionela',
            'email' => 'beatrice.ionela@medicare.com',
            'password' => Hash::make('secret123')
        ]);

        $membershipA = $medic->memberships()->create([
            'patient_id' => $patientA->id
        ]);

        /** @var Membership $membership2 */
        $membershipB = $medic->memberships()->create([
            'patient_id' => $patientB->id
        ]);


        $appointmentA = $membershipA->appointments()->create([
            'date' => now()->subMonth(),
            'honored' => true,
            'confirmed' => true
        ]);

        $appointmentB = $membershipB->appointments()->create([
            'date' => now()->addMonth(),
            'honored' => false,
            'confirmed' => true
        ]);


    }
}
