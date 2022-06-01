<?php

namespace Database\Seeders;

use App\Models\Appointment;
use App\Models\Membership;
use App\Models\Setting;
use App\Models\SettingMedic;
use App\Models\User;
use App\Models\Specialty;
use App\Models\Visit;
use Illuminate\Container\Container;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use Faker\Generator;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        /** @var Generator $faker */
        $faker = Container::getInstance()->make(Generator::class);

        // \App\Models\User::factory(10)->create();
        /** @var User $medic */
        $medic = User::factory()->create([
            'role' => 'medic',
            'firstname' => 'Medic',
            'lastname' => 'Gica',
            'email' => 'medic_1@med.com',
            'password' => Hash::make('secret123')
        ]);

        /** @var User $medic2 */
        $medic2 = User::factory()->create([
            'role' => 'medic',
            'firstname' => 'Medic',
            'lastname' => 'Capsunica',
            'email' => 'medic_2@med.com',
            'password' => Hash::make('secret123')
        ]);

        /** @var User $patient */
        $patient = User::factory()->create([
            'role' => 'patient',
            'firstname' => 'Patient',
            'lastname' => 'Ionica',
            'email' => 'patient_1@pat.com',
            'password' => Hash::make('secret123')
        ]);

        // Avatars
        $medic->addMediaFromUrl('https://i.imgur.com/ViyDFni.jpg')->toMediaCollection('avatars');
        $medic2->addMediaFromUrl('https://i.imgur.com/jWRAc7O.jpg')->toMediaCollection('avatars');

        // Memberships
        /** @var Membership $membership */
        $membership = $medic->memberships()->create([
            'patient_id' => $patient->id
        ]);

        /** @var Membership $membership2 */
        $membership2 = $medic2->memberships()->create([
            'patient_id' => $patient->id
        ]);

        // Appointments
        /** @var Appointment $appointment */
        /** @var Appointment $appointment2 */
        /** @var Appointment $appointment3 */
        /** @var Appointment $appointment4 */

        $appointment = $membership->appointments()->create([
            'date' => now(),
            'honored' => true
        ]);

        $membership->appointments()->create([
            'date' => now()->addWeek(),
            'honored' => true
        ]);

        $membership->appointments()->create([
            'date' => now()->addMonth(),
            'honored' => true
        ]);

        $membership->appointments()->create([
            'date' => now()->addYear(),
            'honored' => true
        ]);

        $appointment2 = $membership->appointments()->create([
            'date' => now()->addWeek(),
            'honored' => false
        ]);

        $appointment3 = $membership2->appointments()->create([
            'date' => now(),
            'honored' => true
        ]);

        $appointment4 = $membership2->appointments()->create([
            'date' => now(),
            'honored' => false
        ]);


        // Visits
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


        // Records
        $record = $visit->record()->create([
            'medical_history' => $faker->text(2000),
            'symptoms' => $faker->text(2000),
            'diagnosis' => $faker->text(2000),
            'clinical_data' => $faker->text(2000),
            'para_clinical_data' => $faker->text(2000),
            'referral' => false,
            'indications' => $faker->text(2000),
            'date_processed' => now()->subDay(7)
        ]);

//        $record2 = $visit2->record()->create([
//            'medical_history' => $faker->text(),
//            'symptoms' => $faker->text(),
//            'diagnosis' => $faker->text(),
//            'clinical_data' => $faker->text(),
//            'para_clinical_data' => $faker->text(),
//            'referral' => false,
//            'indications' => $faker->text(),
//            'date_processed' => now()->subDay(7)
//        ]);

        $record3 = $visit3->record()->create([
            'medical_history' => $faker->text(),
            'symptoms' => $faker->text(),
            'diagnosis' => $faker->text(),
//            'clinical_data' => $faker->text(),
            'para_clinical_data' => $faker->text(),
            'referral' => true,
            'indications' => $faker->text(),
            'date_processed' => now()->subDay(7)
        ]);

//        $record4 = $visit4->record()->create([
//            'medical_history' => $faker->text(),
//            'symptoms' => $faker->text(),
//            'diagnosis' => $faker->text(),
//            'clinical_data' => $faker->text(),
//            'para_clinical_data' => $faker->text(),
//            'referral' => false,
//            'indications' => $faker->text(),
//            'date_processed' => now()->subDay(7)
//        ]);


        $cardiology = Specialty::factory()->create(['name' => 'Cardiologie']);
        $gynecology = Specialty::factory()->create(['name' => 'Ginecologie']);

        // Settings
        $setting = $medic->settingsMedic()->create([
            'specialty_id' => $cardiology->id
        ]);

        $setting2 = $medic2->settingsMedic()->create([
            'specialty_id' => $gynecology->id
        ]);

        $setting3 = $patient->settingsPatient()->create([
            'cnp' => '2880822426702',
            'birthday' => Carbon::create(1998, 8, 22),
            'gender' => 'f',
            'country' => 'Romania',
            'county' => 'Timis',
            'city' => 'Timisoara',
            'address' => 'Str.Plosnitei, bl.34, sc.A',
            'phone' => '0749987991'
        ]);
    }
}
