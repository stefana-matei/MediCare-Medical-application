<?php

namespace Database\Seeders;

use App\Models\Level;
use App\Models\Membership;
use App\Models\SettingMedic;
use App\Models\Specialty;
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
        // Medics
        /** @var User $medic */
        /** @var User $medic2 */
        /** @var User $medic3 */
        /** @var User $medic4 */
        /** @var User $medic5 */
        /** @var User $medic6 */

        $medic = User::factory()->create([
            'role' => 'medic',
            'firstname' => 'Andrei',
            'lastname' => 'David',
            'email' => 'david.andrei@medicare.com',
            'password' => Hash::make('secret123')
        ]);

        $medic2 = User::factory()->create([
            'role' => 'medic',
            'firstname' => 'Andreea',
            'lastname' => 'Alexandru',
            'email' => 'andreea.alexandru@medicare.com',
            'password' => Hash::make('secret123')
        ]);

        $medic3 = User::factory()->create([
            'role' => 'medic',
            'firstname' => 'Alina',
            'lastname' => 'Anghelus',
            'email' => 'alina.anghelus@medicare.com',
            'password' => Hash::make('secret123')
        ]);

        $medic4 = User::factory()->create([
            'role' => 'medic',
            'firstname' => 'Adina Ioana',
            'lastname' => 'Popescu',
            'email' => 'adina.i.popescu@medicare.com',
            'password' => Hash::make('secret123')
        ]);


        $medic5 = User::factory()->create([
            'role' => 'medic',
            'firstname' => 'Ioan',
            'lastname' => 'Baciu',
            'email' => 'ioan.baciu@medicare.com',
            'password' => Hash::make('secret123')
        ]);

        $medic6 = User::factory()->create([
            'role' => 'medic',
            'firstname' => 'Marius',
            'lastname' => 'Balea',
            'email' => 'marius.balea@medicare.com',
            'password' => Hash::make('secret123')
        ]);


        // Avatars
        $medic->addMediaFromUrl('https://i.imgur.com/ViyDFni.jpg')->toMediaCollection('avatars');
        $medic2->addMediaFromUrl('https://i.imgur.com/jWRAc7O.jpg')->toMediaCollection('avatars');
        $medic3->addMediaFromUrl('https://i.imgur.com/PA96UXv.jpeg')->toMediaCollection('avatars');
        $medic4->addMediaFromUrl('https://i.imgur.com/xWl3Ohm.jpeg')->toMediaCollection('avatars');
        $medic5->addMediaFromUrl('https://i.imgur.com/9fAyvhQ.jpeg')->toMediaCollection('avatars');
        $medic6->addMediaFromUrl('https://i.imgur.com/2OqRqYU.jpeg')->toMediaCollection('avatars');


        // Specialties
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


        // Levels
        /** @var Level $primary */
        /** @var Level $specialist */

        $primary = Level::factory()->create(['name' => 'Medic primar']);
        $specialist = Level::factory()->create(['name' => 'Medic specialist']);


        // SettingsMedic
        /** @var SettingMedic $settingMedic */
        /** @var SettingMedic $settingMedic2 */
        /** @var SettingMedic $settingMedic3 */
        /** @var SettingMedic $settingMedic4 */
        /** @var SettingMedic $settingMedic5 */
        /** @var SettingMedic $settingMedic6 */

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
    }
}
