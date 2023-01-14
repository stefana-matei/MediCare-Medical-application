<?php

namespace Database\Seeders;

use App\Models\Appointment;
use App\Models\Level;
use App\Models\Membership;
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

        // Users
        // \App\Models\User::factory(10)->create();

        // Medics
        /** @var User $medic */
        $medic = User::factory()->create([
            'role' => 'medic',
            'firstname' => 'Andrei',
            'lastname' => 'David',
            'email' => 'david.andrei@medicare.com',
            'password' => Hash::make('secret123')
        ]);

        /** @var User $medic2 */
        $medic2 = User::factory()->create([
            'role' => 'medic',
            'firstname' => 'Andreea',
            'lastname' => 'Alexandru',
            'email' => 'andreea.alexandru@medicare.com',
            'password' => Hash::make('secret123')
        ]);

        /** @var User $medic3 */
        $medic3 = User::factory()->create([
            'role' => 'medic',
            'firstname' => 'Alina',
            'lastname' => 'Anghelus',
            'email' => 'alina.anghelus@medicare.com',
            'password' => Hash::make('secret123')
        ]);

        /** @var User $medic4 */
        $medic4 = User::factory()->create([
            'role' => 'medic',
            'firstname' => 'Adina Ioana',
            'lastname' => 'Popescu',
            'email' => 'adina.i.popescu@medicare.com',
            'password' => Hash::make('secret123')
        ]);

        /** @var User $medic5 */
        $medic5 = User::factory()->create([
            'role' => 'medic',
            'firstname' => 'Ioan',
            'lastname' => 'Baciu',
            'email' => 'ioan.baciu@medicare.com',
            'password' => Hash::make('secret123')
        ]);

        /** @var User $medic6 */
        $medic6 = User::factory()->create([
            'role' => 'medic',
            'firstname' => 'Marius',
            'lastname' => 'Balea',
            'email' => 'marius.balea@medicare.com',
            'password' => Hash::make('secret123')
        ]);

        // Patients
        /** @var User $patient */
        $patient = User::factory()->create([
            'role' => 'patient',
            'firstname' => 'Stefana',
            'lastname' => 'Matei',
            'email' => 'stefana.matei@patient.medicare.com',
            'password' => Hash::make('secret123')
        ]);

//        User::factory(20)->create();


        // Avatars
        $medic->addMediaFromUrl('https://i.imgur.com/ViyDFni.jpg')->toMediaCollection('avatars');
        $medic2->addMediaFromUrl('https://i.imgur.com/jWRAc7O.jpg')->toMediaCollection('avatars');
        $medic3->addMediaFromUrl('https://i.imgur.com/PA96UXv.jpeg')->toMediaCollection('avatars');
        $medic4->addMediaFromUrl('https://i.imgur.com/xWl3Ohm.jpeg')->toMediaCollection('avatars');
        $medic5->addMediaFromUrl('https://i.imgur.com/9fAyvhQ.jpeg')->toMediaCollection('avatars');
        $medic6->addMediaFromUrl('https://i.imgur.com/2OqRqYU.jpeg')->toMediaCollection('avatars');


        // Memberships
        // $patient
        /** @var Membership $membership */
        $membership = $medic->memberships()->create([
            'patient_id' => $patient->id
        ]);

        /** @var Membership $membership2 */
        $membership2 = $medic2->memberships()->create([
            'patient_id' => $patient->id
        ]);

//        /** @var Membership $membership3 */
//        $membership3 = $medic3->memberships()->create([
//            'patient_id' => $patient->id
//        ]);

//        /** @var Membership $membership4 */
//        $membership4 = $medic4->memberships()->create([
//            'patient_id' => $patient->id
//        ]);
//
//        /** @var Membership $membership5 */
//        $membership5 = $medic5->memberships()->create([
//            'patient_id' => $patient->id
//        ]);
//
//        /** @var Membership $membership6 */
//        $membership6 = $medic6->memberships()->create([
//            'patient_id' => $patient->id
//        ]);


        // Appointments
        /** @var Appointment $appointment */
        /** @var Appointment $appointment2 */
        /** @var Appointment $appointment3 */
        /** @var Appointment $appointment4 */
        /** @var Appointment $appointment5 */
        /** @var Appointment $appointment6 */

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
            'date' => now()->subWeek(),
            'honored' => true
        ]);

//        $appointment4 = $membership2->appointments()->create([
//            'date' => now(),
//            'honored' => false
//        ]);
//
//        $appointment5 = $membership3->appointments()->create([
//            'date' => now(),
//            'honored' => true
//        ]);
//
//        $appointment6 = $membership3->appointments()->create([
//            'date' => now(),
//            'honored' => false
//        ]);


        // Visits
        /** @var Visit $visit */
        /** @var Visit $visit2 */
        /** @var Visit $visit3 */
        /** @var Visit $visit4 */
        /** @var Visit $visit5 */
        /** @var Visit $visit6 */

        $visit = $membership->visits()->create([
            'date' => now()->addWeek(),
            'appointment_id' => $appointment->id
        ]);

        $visit2 = $membership->visits()->create([
            'date' => now(),
            'appointment_id' => $appointment2->id
        ]);

        $visit3 = $membership2->visits()->create([
            'date' => now()->addDay(3),
            'appointment_id' => $appointment3->id
        ]);

//        $visit4 = $membership2->visits()->create([
//            'date' => now(),
//            'appointment_id' => $appointment4->id
//        ]);
//
//        $visit5 = $membership3->visits()->create([
//            'date' => now(),
//            'appointment_id' => $appointment5->id
//        ]);
//
//        $visit6 = $membership3->visits()->create([
//            'date' => now(),
//            'appointment_id' => $appointment6->id
//        ]);


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


//        $this->call(SpecialtySeeder::class);

        $allergology = Specialty::factory()->create(['name' => "Alergologie şi imunologie"]);
        $laboratory_analysis = Specialty::factory()->create(['name' => "Analize laborator"]);
        $cardiology = Specialty::factory()->create(['name' => "Cardiologie"]);
        $dermatovenereology = Specialty::factory()->create(['name' => "Dermatovenerologie"]);
        $diabetology = Specialty::factory()->create(['name' => "Diabet zaharat, nutriţie şi boli metabolice"]);
        $endocrinology = Specialty::factory()->create(['name' => "Endocrinologie"]);
        $gastroenterology = Specialty::factory()->create(['name' => "Gastroenterologie"]);
        $haematology = Specialty::factory()->create(['name' => "Hematologie"]);
        $kinetotherapy = Specialty::factory()->create(['name' => "Kinetoterapie"]);
        $family_medicine = Specialty::factory()->create(['name' => "Medicină de familie"]);
        $obstetrics_gynaecology = Specialty::factory()->create(['name' => "Obstetrică - ginecologie"]);
        $paediatrics = Specialty::factory()->create(['name' => "Pediatrie"]);
        $pulmonology = Specialty::factory()->create(['name' => "Pneumologie"]);
        $psychiatry = Specialty::factory()->create(['name' => "Psihiatrie"]);
        $psychology = Specialty::factory()->create(['name' => "Psihologie"]);
        $radiology_imaging = Specialty::factory()->create(['name' => "Radiologie - imagistică medicală"]);
        $radiotherapy = Specialty::factory()->create(['name' => "Radioterapie"]);
        $rheumatology = Specialty::factory()->create(['name' => "Reumatologie"]);


        $primary = Level::factory()->create(['name' => 'Medic primar']);
        $specialist = Level::factory()->create(['name' => 'Medic specialist']);

        // Settings
        $settingMedic = $medic->settingsMedic()->create([
            'level_id' => $primary->id,
            'specialty_id' => $cardiology->id,
            'skills' => 'Ecografie abdominala' . PHP_EOL . 'Ecocardiografie transtoracica',
            'areas_of_activity' => 'Ecografie cardiaca',
            'postgraduate_courses' => '2015: Al 54-lea Congres National de Cardiologie, Sinaia' .
                PHP_EOL . '2011: Curs Ecocardiografie Transesofagiana in practica clinica, Timisoara' .
                PHP_EOL . '2009: Curs Cum tratam hipertensiunea arteriala',
            'member' => 'Societatea Romana de Cardiologie'
        ]);

        $settingMedic2 = $medic2->settingsMedic()->create([
            'level_id' => $specialist->id,
            'specialty_id' => $cardiology->id,
            'skills' => 'Cardiologie pediatrica' . PHP_EOL . 'Ecografie',
            'education' => 'Ianuarie 2016 - prezent: Medic Specialist Cardiolog in cadrul Clinicii de Cardiologie a Spitalului Clinic de Urgenta Bucuresti' .
                PHP_EOL . 'Iunie 2012 – Decembrie 2015: Spitalul Clinic de Urgenta Bucuresti, Medic rezident, Sectia Cardiologie' .
                PHP_EOL . '2004-2010: Facultatea de Medicina si Farmacie “Iuliu Hatieganu” Cluj-Napoca, Romania',
            'postgraduate_courses' => '2014: EHRA Course: Cardiac Pacing, ICD and Cardiac Resynchronisation, Viena, Austria.' .
                PHP_EOL . '2012: “Cardiologists of Tomorrow” grant oferit de Societate Europeana de Cardiologie(ESC) pentru participarea a ce de-al 60-lea congres ESC, Munchen 24-29 August 2012' .
                PHP_EOL . '2011: Basis of Good Clinical Practice for Investigators, Verum.edu symposia, 11 Aprilie 2011, Bucuresti, Romania',
            'trainings' => '2010 Ianuarie: stagiu de Obstetrica/Ginecologie, Univ.-Frauenklinik Heidelberg, Germania' .
                PHP_EOL . '2007 August: Hospital de Santa Maria, sectia de Medicina Interna, Lisabona, Portugalia' .
                PHP_EOL . '2005 Noiembrie: Centre l’Hopitalier Regional de Meulan-Les Mureaux, sectia de Pneumologie, Paris, Franta',
            'member' => 'Societatea Europeana de Cardiologie' . PHP_EOL . 'Asociatia Europeana de Aritmologie' .
                PHP_EOL . 'Asociatia Europeana de Imagistica Cardiovasculara' .
                PHP_EOL . 'Societatea Europeana de Cardiologie'
        ]);

        $settingMedic3 = $medic3->settingsMedic()->create([
            'level_id' => $primary->id,
            'specialty_id' => $endocrinology->id
        ]);

        $settingMedic4 = $medic4->settingsMedic()->create([
            'level_id' => $primary->id,
            'specialty_id' => $gastroenterology->id
        ]);

        $settingMedic5 = $medic5->settingsMedic()->create([
            'level_id' => $specialist->id,
            'specialty_id' => $dermatovenereology->id
        ]);

        $settingMedic6 = $medic6->settingsMedic()->create([
            'level_id' => $primary->id,
            'specialty_id' => $obstetrics_gynaecology->id,
            'specialisation' => 'Chirurgia endometriozei (peste 100 de cazuri de endometrioza avansata operate pe an, cu rezectii colorectale, cu rezectii de vezica si alte tipuri de interventii similare)',
            'skills' => 'competenta in ecografie obstetrica-ginecologie' .
                PHP_EOL . 'competenta in histeroscopie' .
                PHP_EOL . 'competenta in laparoscopie',
            'trainings' => 'Chirurgie avansata in domeniul endometriozei, Prof. Hudelist, Viena, Austria' .
                PHP_EOL . 'Chirurgice avansata in domeniul endometriozei, Prof. Horace Roman, Rouen, France' .
                PHP_EOL . 'Chirururgie avansata in domeniul endometriozei, Prof. Keckstein, Villach, Austria',
            'international_certifications' => 'Certificare Fetal Medical Foundation, London (FMF)' .
                PHP_EOL . 'EndoCert, Centrul de Excelenta Endo Institute acreditat de Liga Europeana de Endometrioza',
            'publications' => 'Pelvic nerves Endometriosis, EEL 2018' .
                PHP_EOL . 'Pregnancy after deep endometriosis surgery –National Congress of Obstetrics and Gynecology, 2018' .
                PHP_EOL . 'First Romanan experience as a center for deep Endometriosis surgery, SEUD Pars, 2015',
            'other_realizations' => 'Proiecte: ' . PHP_EOL . 'Cofondator Spitalul Premiere, cel mai mare spital privat din regiunea de Vest a Romaniei' .
                PHP_EOL . 'Fondator al Centrului de Excelenta EndoInstitute Timisoara'
        ]);

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

    }
}
