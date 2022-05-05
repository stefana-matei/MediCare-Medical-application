<?php

namespace Database\Seeders;

use App\Models\Membership;
use App\Models\User;
use App\Models\Visit;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;

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
            'email' => 'medic_1@med.com',
            'password' => Hash::make('secret123')
        ]);

        /** @var User $patient */
        $patient = User::factory()->create([
            'role' => 'patient',
            'name' => 'Patient 1',
            'email' => 'patient_1@pat.com',
            'password' => Hash::make('secret123')
        ]);

        /** @var User $medic2 */
        $medic2 = User::factory()->create([
            'role' => 'medic',
            'name' => 'Medic 2',
            'email' => 'medic_2@med.com',
            'password' => Hash::make('secret123')
        ]);



        /** @var Membership $membership */
        $membership = $medic->memberships()->create([
            'patient_id' => $patient->id
        ]);

        /** @var Membership $membership2 */
        $membership2 = $medic2->memberships()->create([
            'patient_id' => $patient->id
        ]);


        /** @var Visit $visit */
        /** @var Visit $visit2 */
        /** @var Visit $visit3 */
        /** @var Visit $visit4 */

        $visit = $membership->visits()->create([ 'date' => now() ]);
        $visit2 = $membership->visits()->create([ 'date' => now() ]);
        $visit3 = $membership2->visits()->create([ 'date' => now() ]);
        $visit4 = $membership2->visits()->create([
            'honored' => true,
            'date' => now()
        ]);

        $record = $visit->record()->create([
            'file_name' => "Fisa nr. 1",
            'date_processed' => now()->subDay(7)
        ]);
//        $record2 = $visit2->record()->create([ 'file_name' => "Fisa nr. 2" ]);
        $record3 = $visit3->record()->create([ 'file_name' => "Fisa nr. 3" ]);
//        $record4 = $visit4->record()->create([ 'file_name' => "Fisa nr. 4" ]);


    }
}
