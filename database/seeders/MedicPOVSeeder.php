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

        /** @var User $patient1 */
        $patient1 = User::factory()->create([
            'role' => 'patient',
            'firstname' => 'Andromeda',
            'lastname' => 'Gheorghescu',
            'email' => 'andromeda.gheorghescu@medicare.com',
            'password' => Hash::make('secret123')
        ]);

        /** @var User $patient2 */
        $patient2 = User::factory()->create([
            'role' => 'patient',
            'firstname' => 'Beatrice',
            'lastname' => 'Ionela',
            'email' => 'beatrice.ionela@medicare.com',
            'password' => Hash::make('secret123')
        ]);

        $membership1 = $medic->memberships()->create([
            'patient_id' => $patient1->id
        ]);

        /** @var Membership $membership2 */
        $membership2 = $medic->memberships()->create([
            'patient_id' => $patient2->id
        ]);


        $appointment1 = $membership1->appointments()->create([
            'date' => now()->subMonth(),
            'honored' => true,
            'confirmed' => true
        ]);

        $appointment2 = $membership2->appointments()->create([
            'date' => now()->addMonth(),
            'honored' => false,
            'confirmed' => true
        ]);


    }
}
