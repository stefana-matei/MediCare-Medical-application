<?php

namespace Database\Seeders;

use App\Models\Appointment;
use App\Models\Level;
use App\Models\Membership;
use App\Models\Record;
use App\Models\SettingPatient;
use App\Models\Specialty;
use App\Models\User;
use App\Models\Visit;
use Faker\Generator;
use Illuminate\Container\Container;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;

class PatientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /** @var Generator $faker */
        $faker = Container::getInstance()->make(Generator::class);


        // Medics
        /** @var User $medic */
        /** @var User $medic2 */
        /** @var User $medic3 */
        /** @var User $medic4 */
        /** @var User $medic5 */
        /** @var User $medic6 */

        $medic = User::find(1);
        $medic2 = User::find(2);
        $medic3 = User::find(3);
        $medic4 = User::find(4);
        $medic5 = User::find(5);
        $medic6 = User::find(6);


        // Patients
        /** @var User $patient */
        /** @var User $patient2 */
        /** @var User $patient3 */
        /** @var User $patient4 */

        $patient = User::factory()->create([
            'role' => 'patient',
            'firstname' => 'Stefana',
            'lastname' => 'Matei',
            'email' => 'stefana.matei@patient.medicare.com',
            'password' => Hash::make('secret123')
        ]);

        $patient2 = User::factory()->create([
            'role' => 'patient',
            'firstname' => 'Andromeda',
            'lastname' => 'Gheorghescu',
            'email' => 'andromeda.gheorghescu@patient.medicare.com',
            'password' => Hash::make('secret123')
        ]);

        $patient3 = User::factory()->create([
            'role' => 'patient',
            'firstname' => 'Beatrice',
            'lastname' => 'Ionescu',
            'email' => 'beatrice.ionescu@patient.medicare.com',
            'password' => Hash::make('secret123')
        ]);

        $patient4 = User::factory()->create([
            'role' => 'patient',
            'firstname' => 'Ioan',
            'lastname' => 'Benescu',
            'email' => 'ioan.benescu@patient.medicare.com',
            'password' => Hash::make('secret123')
        ]);

//        User::factory(20)->create();

        // Memberships
        /** @var Membership $membership */
        /** @var Membership $membership2 */
        /** @var Membership $membership3 */
        /** @var Membership $membership4 */
        /** @var Membership $membership5 */

        // for $patient
        $membership = $medic->memberships()->create([
            'patient_id' => $patient->id
        ]);

        $membership2 = $medic2->memberships()->create([
            'patient_id' => $patient->id
        ]);

        $membership3 = $medic3->memberships()->create([
            'patient_id' => $patient->id
        ]);

        // $patient2
        $membership4 = $medic->memberships()->create([
            'patient_id' => $patient2->id
        ]);

        // $patient3
        $membership5 = $medic->memberships()->create([
            'patient_id' => $patient3->id
        ]);


        // Appointments
        /** @var Appointment $appointment */
        /** @var Appointment $appointment2 */
        /** @var Appointment $appointment3 */
        /** @var Appointment $appointment4 */
        /** @var Appointment $appointment5 */
        /** @var Appointment $appointment6 */
        /** @var Appointment $appointment7 */
        /** @var Appointment $appointment8 */


        // Programari in asteptare
        // Important: pentru a fi in astepare => 'confirmed' = null
        $membership->appointments()->create([
            'date' => now()->addMonth()->endOfDay()
        ]);

        $membership->appointments()->create([
            'date' => now()->endOfDay()
        ]);
        $membership->appointments()->create([
            'date' => now()->addDays(1)->endOfDay()
        ]);
        $membership->appointments()->create([
            'date' => now()->addDays(2)->endOfDay()
        ]);
        $membership->appointments()->create([
            'date' => now()->addDays(3)->endOfDay()
        ]);


        $appointment5 = $membership3->appointments()->create([
            'date' => now()->addWeek(2)->endOfDay(),
            'honored' => true
        ]);


        // Programari viitoare
        $membership->appointments()->create([
            'date' => now()->addWeek()->hours(10)->minutes(0),
            'confirmed' => true,
            'honored' => false
        ]);

        $membership->appointments()->create([
            'date' => now()->addYear()->hours(12)->minutes(0),
            'confirmed' => true,
            'honored' => false
        ]);


        //Programari anterioare
        $appointment = $membership->appointments()->create([
            'date' => now()->subMonth()->hours(13)->minutes(30),
            'confirmed' => true,
            'honored' => true
        ]);

        $appointment3 = $membership2->appointments()->create([
            'date' => now()->subWeek()->hours(15)->minutes(0),
            'confirmed' => true,
            'honored' => true
        ]);

        $appointment6 = $membership4->appointments()->create([
            'date' => now()->subMonth()->hours(11)->minutes(30),
            'confirmed' => true,
            'honored' => true
        ]);


        $membership->appointments()->create([
            'date' => now()->subWeeks(3)->addDays(2)->hours(10)->minutes(0),
            'confirmed' => true,
            'honored' => true
        ]);

        $membership4->appointments()->create([
            'date' => now()->subWeeks(4)->addDays(2)->hours(13)->minutes(30),
            'confirmed' => true,
            'honored' => true
        ]);

        $membership5->appointments()->create([
            'date' => now()->subWeeks(5)->addDays(3)->hours(9)->minutes(30),
            'confirmed' => true,
            'honored' => true
        ]);

        $membership4->appointments()->create([
            'date' => now()->subWeeks(6)->addDays(3)->hours(12)->minutes(0),
            'confirmed' => true,
            'honored' => true
        ]);

        $membership->appointments()->create([
            'date' => now()->subWeeks(3)->addDays(3)->hours(14)->minutes(0),
            'confirmed' => true,
            'honored' => true
        ]);

        $membership4->appointments()->create([
            'date' => now()->subWeeks(8)->hours(16)->minutes(30),
            'confirmed' => true,
            'honored' => true
        ]);

        $membership4->appointments()->create([
            'date' => now()->subWeeks(12)->hours(16)->minutes(30),
            'confirmed' => true,
            'honored' => true
        ]);

//        $membership4->appointments()->create([
//            'date' => now(),
//            'confirmed' => true,
//            'honored' => true
//        ]);

        $appointment8 = $membership->appointments()->create([
            'date' => now()->subMonths(2)->hours(12)->minutes(0),
            'confirmed' => true,
            'honored' => true
        ]);


        // neonorata
        $appointment4 = $membership2->appointments()->create([
            'date' => now()->subMonth()->hours(10)->minutes(30),
            'confirmed' => true,
            'honored' => false
        ]);

        $appointment7 = $membership5->appointments()->create([
            'date' => now()->addMonth()->hours(15)->minutes(30),
            'confirmed' => true,
            'honored' => false
        ]);


        // Programari refuzate
        $appointment2 = $membership->appointments()->create([
            'date' => now()->addWeek()->endOfDay(),
            'confirmed' => false,
            'honored' => false
        ]);


        // Visits
        /** @var Visit $visit */
        /** @var Visit $visit2 */
        /** @var Visit $visit3 */
        /** @var Visit $visit4 */
        /** @var Visit $visit5 */
        /** @var Visit $visit6 */

        $visit = $membership->visits()->create([
            'date' => $appointment->date,
            'appointment_id' => $appointment->id
        ]);

//        $visit2 = $membership->visits()->create([
//            'date' => $appointment2->date,
//            'appointment_id' => $appointment2->id
//        ]);

        $visit3 = $membership2->visits()->create([
            'date' => $appointment3->date,
            'appointment_id' => $appointment3->id
        ]);

        $visit4 = $membership4->visits()->create([
            'date' => $appointment6->date,
            'appointment_id' => $appointment6->id
        ]);

        $visit5 = $membership->visits()->create([
            'date' => $appointment8->date,
            'appointment_id' => $appointment8->id
        ]);


        // Records
        /** @var Record $record */
        /** @var Record $record2 */
        /** @var Record $record3 */

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

        $record2 = $visit3->record()->create([
            'medical_history' => $faker->text(),
            'symptoms' => $faker->text(),
            'diagnosis' => $faker->text(),
            'para_clinical_data' => $faker->text(),
            'referral' => true,
            'indications' => $faker->text(),
            'date_processed' => now()->subDay(7)
        ]);

//        $record3 = $visit4->record()->create([
//            'medical_history' => $faker->text(),
//            'symptoms' => $faker->text(),
//            'diagnosis' => $faker->text(),
//            'para_clinical_data' => $faker->text(),
//            'referral' => true,
//            'indications' => $faker->text(),
//            'date_processed' => now()->subDay(7)
//        ]);

        // SettingsPatient
        /** @var SettingPatient $settingPatient */
        /** @var SettingPatient $settingPatient2 */
        /** @var SettingPatient $settingPatient3 */
        /** @var SettingPatient $settingPatient4 */

        $settingPatient = $patient->settingsPatient()->create([
            'pin' => '2880822426702',
            'birthday' => Carbon::create(1998, 8, 22),
            'gender' => 'f',
            'country' => 'Romania',
            'county' => 'Timis',
            'city' => 'Timisoara',
            'address' => 'Str.Plosnitei, bl.34, sc.A',
            'phone' => '0749987991'
        ]);

        $settingPatient2 = $patient2->settingsPatient()->create([
            'pin' => '2740303458903',
            'birthday' => Carbon::create(1974, 3, 03),
            'gender' => 'f',
            'country' => 'Romania',
            'county' => 'Timis',
            'city' => 'Timisoara',
            'address' => 'Str.Plosnitei, bl.34, sc.A',
            'phone' => '0749284591'
        ]);

        $settingPatient3 = $patient3->settingsPatient()->create([
            'pin' => '2740303458745',
            'birthday' => Carbon::create(1974, 3, 03),
            'gender' => 'f',
            'country' => 'Romania',
            'county' => 'Timis',
            'city' => 'Timisoara',
            'address' => 'Str.Plosnitei, bl.34, sc.A',
            'phone' => '0749284591'
        ]);

        $settingPatient4 = $patient4->settingsPatient()->create([
            'pin' => '1840303458745',
            'birthday' => Carbon::create(1984, 3, 03),
            'gender' => 'm',
            'country' => 'Romania',
            'county' => 'Timis',
            'city' => 'Timisoara',
            'address' => 'Str.Plosnitei, bl.34, sc.A',
            'phone' => '0742821912'
        ]);
    }
}
