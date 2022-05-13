<?php

namespace Database\Seeders;

use App\Models\Appointment;
use App\Models\Membership;
use App\Models\Setting;
use App\Models\User;
use App\Models\Specialty;
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

        /** @var User $medic2 */
        $medic2 = User::factory()->create([
            'role' => 'medic',
            'name' => 'Medic 2',
            'email' => 'medic_2@med.com',
            'password' => Hash::make('secret123')
        ]);

        /** @var User $patient */
        $patient = User::factory()->create([
            'role' => 'patient',
            'name' => 'Patient 1',
            'email' => 'patient_1@pat.com',
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


        // appointments
        /** @var Appointment $appointment */
        /** @var Appointment $appointment2 */
        /** @var Appointment $appointment3 */
        /** @var Appointment $appointment4 */

        $appointment = $membership->appointments()->create([
            'date' => now(),
            'specialty' => 'Urology',
            'honored' => true
        ]);

        $appointment2 = $membership->appointments()->create([
            'date' => now(),
            'specialty' => 'Cardiology',
            'honored' => false
        ]);

        $appointment3 = $membership2->appointments()->create([
            'date' => now(),
            'specialty' => 'Gynecology',
            'honored' => true
        ]);

        $appointment4 = $membership2->appointments()->create([
            'date' => now(),
            'specialty' => 'Gynecology',
            'honored' => false
        ]);



        // visits
        /** @var Visit $visit */
        /** @var Visit $visit2 */
        /** @var Visit $visit3 */
        /** @var Visit $visit4 */

        $visit = $membership->visits()->create([
            'date' => now(),
            'appointment_id' => $appointment->id
        ]);

        $visit2 = $membership->visits()->create([
            'date' => now(),
            'appointment_id' => $appointment2->id
        ]);

        $visit3 = $membership2->visits()->create([
            'date' => now(),
            'appointment_id' => $appointment3->id
        ]);

        $visit4 = $membership2->visits()->create([
            'date' => now(),
            'appointment_id' => $appointment4->id
        ]);


        // records
        $record = $visit->record()->create([
            'file_name' => "Fisa nr. 1",
            'date_processed' => now()->subDay(7)
        ]);
//        $record2 = $visit2->record()->create([ 'file_name' => "Fisa nr. 2" ]);
        $record3 = $visit3->record()->create([ 'file_name' => "Fisa nr. 3" ]);
//        $record4 = $visit4->record()->create([ 'file_name' => "Fisa nr. 4" ]);


        $specialty = Specialty::factory()->create(['name' => 'Cardiology']);

        // Settings
        (new Setting())->for($medic->role)->create([
            'user_id' => $medic->id,
            'specialty_id' => $specialty->id
        ]);

    }
}
