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
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class PresentationSeeder extends Seeder
{
    /** @var Generator */
    private $faker;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->faker = Container::getInstance()->make(Generator::class);

        $specialties = Specialty::all();

        $record1 = [
            'medical_service' => 'Consult pacient peste 4 ani',
            'medical_history' => 'Pacienta in varsta de 48 ani, nascuta in judetul IS si domiciliata in judetul TM, cu antecedente heredo-colaterale de patologie cardio-vasculara si metabolica, si afirmativ, fara antecedente personale patologice semnificative, s-a prezentat in cadrul policlinicii, serviciul de Endocrinologie la indicatia medicului ORL-ist cu suspiciunea de tiroidita subacuta, initial in data de 27.10.2017. Simptomatologia descrisa la momentul respectiv, a debutat in urma cu cca 1 luna anterior prezentarii. S-a recomandat efectuarea investigatiilor, investigatii ce au exclus diagnosticul de tiroidita subacuta, dar care au evidentiat o tiroidita cronica autoimuna in stadiul de eutiroidie, motiv pentru care nu s-a recomandat tratament ci reevaluarea functionalitaii tiroidiene peste 3 luni.',
            'symptoms' => 'reevaluare clinico-biologica',
            'diagnosis' => 'Tiroidita autoimuna - E06.3',
            'clinical_data' => 'TA=110/70 mmHG; Fc= 80 b/min- ritmic',
            'para_clinical_data' => 'Ecografie tiroidiana (27.10.2017): LTD=19.5/18.1/49.3 mm; LTS=17.3/18.2/47 mm; VLTD=8.70 ml; VLTS=7.39 ml; VT=16.09 ml. Parenchim tiroidian moderat hipoecogen, neomogen, cu vascularizatie accentuata la examenul Doppler.La nivelul LTS prezinta o zona hipoecogena/transonica de cca 4.9 mm, nevascularizata.
9.11.2017
ac anti TPO=87.76 UI/ml (<34)
ac anti TG=18.3 UI/ml (<=115)
ac anti receptor TSH<0.3 UI/ml (<1.58) TSH=2.85 uUI/ml (0.270-4.20)',
            'referral' => true,
            'indications' => '1. Regim igieno-dietetic conform recomandarilor- sunt contraindicate suplimentele polivitaminice ce contin iod!!!
2. Va efectua investigatii confom biletului de trimitere. Revine cu rezultatele Pana atunci continua tratament confom indicatiilor anterioare
3. De asemenea se recomanda evaluare reumatologica (poliartralgii predominat la nivelul mebrelor inferioare cu predilectie la frig)'
        ];

        $record2 = [
            'medical_service' => 'Ecografie aparat urinar (rinichi + vezica urinara)',
            'medical_history' => 'Endometrioza peritoneului pelvian - 2019',
            'symptoms' => 'algurie din 14.08.2022, care s-a ameliorat dupa administrarea de D-manoza, extract de merisor',
            'diagnosis' => 'Alte simptome si semne referitoare la sistemul urinar si nespecificate - R39.8',
            'para_clinical_data' => '18.08.2022: ex urina-fara modificari; urocultura<100 UFC/ml
ECO: Ambii rinichi dimensiuni si aspect normal ecografic, fara calculi, fara staza. Vezica urinara contur regulat, fara rezidiu postmictional.',
            'referral' => true,
            'indications' => '- aport hidric minim 2500 ml/zi
- tratament cu Uractiv forte 2x1 cp/zi, 10 zile + Deprox 500 2 cp/zi, 1 luna + Aceclofen 2x1 sup/zi, 5 zile
- revine la control peste o luna'
        ];




        // Get specialties if they are created in a different seeder
        $allergology = $specialties[0];
        $laboratory_analysis = $specialties[1];
        $cardiology = $specialties[2];
        $dermatovenereology = $specialties[3];
        $diabetology = $specialties[4];
        $endocrinology = $specialties[5];
        $gastroenterology = $specialties[6];
        $haematology = $specialties[7];
        $kinetotherapy = $specialties[8];
        $family_medicine = $specialties[9];
        $obstetrics_gynaecology = $specialties[10];
        $paediatrics = $specialties[11];
        $pulmonology = $specialties[12];
        $psychiatry = $specialties[13];
        $psychology = $specialties[14];
        $radiology_imaging = $specialties[15];
        $radiotherapy = $specialties[16];
        $rheumatology = $specialties[17];

        $medic1extraSettings = [
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
        ];

        $medic2extraSettings = [
            'skills' => 'Ecografie abdominala' . PHP_EOL . 'Ecocardiografie transtoracica',
            'areas_of_activity' => 'Ecografie cardiaca',
            'postgraduate_courses' => '2015: Al 54-lea Congres National de Cardiologie, Sinaia' .
                PHP_EOL . '2011: Curs Ecocardiografie Transesofagiana in practica clinica, Timisoara' .
                PHP_EOL . '2009: Curs Cum tratam hipertensiunea arteriala',
            'member' => 'Societatea Romana de Cardiologie'
        ];

        $medic3extraSettings = [
            'trainings' => 'Chirurgie avansata in domeniul endometriozei, Prof. Hudelist, Viena, Austria' .
            PHP_EOL . 'Chirurgice avansata in domeniul endometriozei, Prof. Horace Roman, Rouen, France' .
            PHP_EOL . 'Chirururgie avansata in domeniul endometriozei, Prof. Keckstein, Villach, Austria',
            'international_certifications' => 'Certificare Fetal Medical Foundation, London (FMF)' .
                PHP_EOL . 'EndoCert, Centrul de Excelenta Endo Institute acreditat de Liga Europeana de Endometrioza',];
        $medic6extraSettings = [
            'specialisation' => 'Chirurgia endometriozei (peste 100 de cazuri de endometrioza avansata operate pe an, cu rezectii colorectale, cu rezectii de vezica si alte tipuri de interventii similare)',
            'skills' => 'competenta in ecografie obstetrica-ginecologie' .
                PHP_EOL . 'competenta in histeroscopie' .
                PHP_EOL . 'competenta in laparoscopie',
            'publications' => 'Pelvic nerves Endometriosis, EEL 2018' .
                PHP_EOL . 'Pregnancy after deep endometriosis surgery –National Congress of Obstetrics and Gynecology, 2018' .
                PHP_EOL . 'First Romanan experience as a center for deep Endometriosis surgery, SEUD Pars, 2015',
            'other_realizations' => 'Proiecte: ' . PHP_EOL . 'Cofondator Spitalul Premiere, cel mai mare spital privat din regiunea de Vest a Romaniei' .
                PHP_EOL . 'Fondator al Centrului de Excelenta EndoInstitute Timisoara'
        ];



        $medic1 = $this->createMedic('Andrei', 'Popa', 1, $cardiology, 'medic_prezentare', $medic1extraSettings);
        $medic2 = $this->createMedic('Andreea', 'Alexandrescu', 1, $cardiology, null, $medic2extraSettings);
        $medic3 = $this->createMedic('Violeta', 'Sandu', 1, $haematology, null, $medic3extraSettings);
        $medic4 = $this->createMedic('Ioan', 'Voicu', 1, $family_medicine);
        $medic5 = $this->createMedic('Claudia', 'Pacurar', 1, $family_medicine);
        $medic6 = $this->createMedic('Marius', 'Munteanu', 1, $family_medicine, null, $medic6extraSettings);
        $medic7 = $this->createMedic('Maria', 'David', 2, $paediatrics);
        $medic8 = $this->createMedic('Mihaela', 'Lascu', 2, $haematology);
        $medic9 = $this->createMedic('Valentina', 'Darie', 1, $kinetotherapy);
        $medic10 = $this->createMedic('Adrian', 'Costea', 1, $kinetotherapy);
        $medic11 = $this->createMedic('Vasile', 'Pana', 1, $kinetotherapy);
        $medic12 = $this->createMedic('Simona', 'Baltag', 1, $kinetotherapy);
        $medic13 = $this->createMedic('Ioana', 'Dumbrava', 1, $pulmonology);
        $medic14 = $this->createMedic('David', 'Ardealeanu', 2, $psychiatry);
        $medic15 = $this->createMedic('Iulian', 'Andreica', 1, $radiology_imaging);
        $medic16 = $this->createMedic('Angela', 'Iacobut', 2, $rheumatology);

        $medic1->addMediaFromUrl('https://i.imgur.com/ViyDFni.jpg')->toMediaCollection('avatars');
        $medic2->addMediaFromUrl('https://i.imgur.com/jWRAc7O.jpg')->toMediaCollection('avatars');
        $medic3->addMediaFromUrl('https://i.imgur.com/PA96UXv.jpeg')->toMediaCollection('avatars');
        $medic4->addMediaFromUrl('https://i.imgur.com/9fAyvhQ.jpeg')->toMediaCollection('avatars');
        $medic5->addMediaFromUrl('https://i.imgur.com/xWl3Ohm.jpeg')->toMediaCollection('avatars');
        $medic6->addMediaFromUrl('https://i.imgur.com/2OqRqYU.jpeg')->toMediaCollection('avatars');


        $patient1 = $this->createPatient('Elena', 'Constantinescu', 'f', '03/07/1974', 'pacient_prezentare');
        $patient2 = $this->createPatient('Aida', 'Popescu', 'f', '02/06/1979');
        $patient3 = $this->createPatient('Mihai', 'Enescu', 'm', '15/01/1978');
        $patient4 = $this->createPatient('Otilia', 'Ignea', 'f', '17/12/1981');
        $patient5 = $this->createPatient('Sorin', 'Marinescu', 'm', '20/03/1981');
        $patient6 = $this->createPatient('Octavian', 'Popa', 'm', '25/05/1990');
        $patient7 = $this->createPatient('Alina', 'Teodorescu', 'f', '30/03/1971');
        $patient8 = $this->createPatient('Mihaela', 'Stanciu', 'f', '08/04/1988');
        $patient9 = $this->createPatient('Cosmin', 'Sandu', 'm', '11/07/1995');
        $patient10 = $this->createPatient('Raluca', 'Petrache', 'f', '22/07/1998');
        $patient11 = $this->createPatient('Georgiana', 'Matei', 'f', '13/09/1998');
        $patient12 = $this->createPatient('Andreea', 'Zegan', 'f', '02/02/1992');
        $patient13 = $this->createPatient('Ilie', 'Druia', 'm', '07/07/1997');
        $patient14 = $this->createPatient('Cristina', 'Benescu', 'f', '30/04/1997');
        $patient15 = $this->createPatient('Cerasela', 'Petre', 'f', '25/11/1975');


        // Medic #1
        $membership_1_1 = $this->createMembership($medic1, $patient1);
        $membership_1_2 = $this->createMembership($medic1, $patient2);
        $membership_1_3 = $this->createMembership($medic1, $patient3);
        $membership_1_4 = $this->createMembership($medic1, $patient4);
        $membership_1_6 = $this->createMembership($medic1, $patient6);
        $membership_1_8 = $this->createMembership($medic1, $patient8);
        $membership_1_11 = $this->createMembership($medic1, $patient11);



        // Pacient #1
//        $membership_1_1 = $this->createMembership($medic2, $patient1); // Already exists
        $membership_2_1 = $this->createMembership($medic2, $patient1);
        $membership_3_1 = $this->createMembership($medic3, $patient1);
        $membership_4_1 = $this->createMembership($medic4, $patient1);
        $membership_6_1 = $this->createMembership($medic6, $patient1);
        $membership_8_1 = $this->createMembership($medic8, $patient1);
        $membership_11_1 = $this->createMembership($medic11, $patient1);


        // Appointments Pacient 1
        $appointment1_1_1 = $this->createAppointment($membership_1_1, '24/02/2023 14:00', true, false);
        $appointment1_1_1 = $this->createAppointment($membership_1_1, '24/02/2023 23:59', false, false);

        $appointment2_1_1 = $this->createAppointment($membership_1_1, '05/01/2023 10:00', true, true); // visit record TODO Use to showcase
        $appointment3_1_1 = $this->createAppointment($membership_1_1, '06/01/2023 11:00', true, true); // visit
        $appointmentr_1_1 = $this->createAppointment($membership_1_1, '08/02/2023 10:00', true, true); // visit record TODO Use to showcase

        $appointment4_2_1 = $this->createAppointment($membership_2_1, '27/02/2023 10:30', null, false);
        $appointment4_2_1 = $this->createAppointment($membership_2_1, '26/02/2023 10:30', false, false);

        $appointment5_3_1 = $this->createAppointment($membership_3_1, '18/02/2023 09:30', true, false);
        $appointment6_3_1 = $this->createAppointment($membership_3_1, '15/01/2023 09:30', true, true); // visit

        $appointment7_4_1 = $this->createAppointment($membership_3_1, '11/02/2023 09:30', true, false);

        $appointment8_6_1 = $this->createAppointment($membership_6_1, '14/12/2022 15:30', true, true);

        $this->createVisitAndRecord($membership_1_1, $appointment2_1_1, $record1);
        $this->createVisitAndRecord($membership_1_1, $appointmentr_1_1, $record2);
        $this->createVisit($membership_1_1, $appointment3_1_1);
        $this->createVisit($membership_3_1, $appointment6_3_1);
        $this->createVisit($membership_6_1, $appointment8_6_1);


        // Appointments Medic 1

        // January
        $this->createAppointment($membership_1_2, '02/01/2023 10:00', true, true);
        $this->createAppointment($membership_1_3, '02/01/2023 11:00', true, true);


        $this->createAppointment($membership_1_6, '04/01/2023 08:00', true, true);

        $this->createAppointment($membership_1_2, '05/01/2023 10:00', true, true);
        $this->createAppointment($membership_1_6, '05/01/2023 10:30', true, true);

        $this->createAppointment($membership_1_2, '06/01/2023 12:00', true, true);
        $this->createAppointment($membership_1_11, '06/01/2023 13:00', true);

        $this->createAppointment($membership_1_11, '09/01/2023 08:00', true, true);

        $this->createAppointment($membership_1_4, '10/01/2023 09:00', true, true);

        $this->createAppointment($membership_1_3, '11/01/2023 11:00', true, true);

        $this->createAppointment($membership_1_4, '12/01/2023 08:00', true, true);

        $this->createAppointment($membership_1_6, '13/01/2023 08:00', true, true);
        $this->createAppointment($membership_1_11, '13/01/2023 09:00', true, true);

        $this->createAppointment($membership_1_2, '16/01/2023 10:00', true, true);
        $this->createAppointment($membership_1_11, '16/01/2023 13:00', true);

        $this->createAppointment($membership_1_11, '17/01/2023 08:00', true, true);

        $this->createAppointment($membership_1_4, '19/01/2023 09:00', true, true);

        $this->createAppointment($membership_1_11, '20/01/2023 08:00', true, true);

        $this->createAppointment($membership_1_4, '23/01/2023 09:00', true, true);

        $this->createAppointment($membership_1_3, '24/01/2023 11:00', true, true);

        $this->createAppointment($membership_1_4, '25/01/2023 08:00', true, true);

        $this->createAppointment($membership_1_6, '27/01/2023 08:00', true, true);

        $this->createAppointment($membership_1_2, '30/01/2023 10:00', true, true);
        $this->createAppointment($membership_1_6, '30/01/2023 10:30', true, true);

        $this->createAppointment($membership_1_2, '31/01/2023 12:00', true, true);
        $this->createAppointment($membership_1_11, '31/01/2023 13:00', true);

        // February
        $this->createAppointment($membership_1_2, '01/02/2023 10:00', true, true);
        $this->createAppointment($membership_1_3, '01/02/2023 11:00', true, true);

        $this->createAppointment($membership_1_4, '02/02/2023 08:00', true, true);

        $this->createAppointment($membership_1_6, '03/02/2023 08:00', true, true);
        $this->createAppointment($membership_1_8, '03/02/2023 08:30', true, true);
        $this->createAppointment($membership_1_11, '03/02/2023 09:00', true, true);

        $this->createAppointment($membership_1_2, '06/02/2023 10:00', true, true);
        $this->createAppointment($membership_1_6, '06/02/2023 10:30', true, true);

        $this->createAppointment($membership_1_2, '07/02/2023 12:00', true, true);
        $this->createAppointment($membership_1_11, '07/02/2023 13:00', true);

        $this->createAppointment($membership_1_11, '08/02/2023 08:00', true, true);

        $this->createAppointment($membership_1_4, '09/02/2023 09:00', true, true);

        $this->createAppointment($membership_1_6, '10/02/2023 08:00', true, true);
        $this->createAppointment($membership_1_8, '10/02/2023 12:00', true, true);
        $this->createAppointment($membership_1_11, '10/02/2023 14:00', true, true);

        $this->createAppointment($membership_1_4, '13/02/2023 08:00', true, true);

        $this->createAppointment($membership_1_6, '14/02/2023 08:00', true, true);
        $this->createAppointment($membership_1_8, '14/02/2023 08:30', true, true);
        $this->createAppointment($membership_1_11, '14/02/2023 09:00', true, true);

        $this->createAppointment($membership_1_2, '15/02/2023 10:00', true, true);
        $this->createAppointment($membership_1_6, '15/02/2023 10:30', true, true);

        $this->createAppointment($membership_1_2, '16/02/2023 12:00', true, true);
        $this->createAppointment($membership_1_11, '16/02/2023 13:00', true);

        $this->createAppointment($membership_1_11, '17/02/2023 08:00', true);

        $this->createAppointment($membership_1_4, '20/02/2023 09:00', true);

        $this->createAppointment($membership_1_6, '21/02/2023 08:00', true);
        $this->createAppointment($membership_1_8, '21/02/2023 12:00', true);
        $this->createAppointment($membership_1_11, '21/02/2023 14:00', true);

        $this->createAppointment($membership_1_4, '22/02/2023 08:00', true);

        $this->createAppointment($membership_1_6, '23/02/2023 08:00', true);
        $this->createAppointment($membership_1_8, '23/02/2023 08:30', true);
        $this->createAppointment($membership_1_11, '23/02/2023 12:00', true);

        $this->createAppointment($membership_1_2, '24/02/2023 10:00', true);
        $this->createAppointment($membership_1_6, '24/02/2023 11:30', true);

        $this->createAppointment($membership_1_2, '27/02/2023 10:00', true);
        $this->createAppointment($membership_1_11, '27/02/2023 13:00', true);

        $this->createAppointment($membership_1_11, '28/02/2023 08:00', true);


        // March
        $this->createAppointment($membership_1_4, '01/03/2023 09:00', true);

        $this->createAppointment($membership_1_6, '02/03/2023 08:00', true);
        $this->createAppointment($membership_1_8, '02/03/2023 13:30', true);
        $this->createAppointment($membership_1_11, '02/03/2023 16:00', true);

        $this->createAppointment($membership_1_2, '03/03/2023 10:00', true);
        $this->createAppointment($membership_1_6, '06/03/2023 11:30', true);

        $this->createAppointment($membership_1_2, '08/03/2023 10:00', true);
        $this->createAppointment($membership_1_11, '15/03/2023 13:00', true);

        $this->createAppointment($membership_1_11, '17/03/2023 08:00', true);


        // Pending February and March
        $this->createAppointment($membership_1_4, '20/02/2023 09:00');
        $this->createAppointment($membership_1_6, '22/02/2023 08:00');
        $this->createAppointment($membership_1_8, '23/02/2023 12:00');
        $this->createAppointment($membership_1_11, '28/02/2023 14:00');
        $this->createAppointment($membership_1_2, '02/03/2023 10:00'); // Accept TODO Use to showcase
        $this->createAppointment($membership_1_11, '03/03/2023 13:00');

    }


    /**
     * @param string $firstname
     * @param string $lastname
     * @param $email
     * @return User
     */
    private function createMedic(string $firstname, string $lastname, int $level, Specialty $specialty, $email = null, array $extra = [])
    {
        if (is_null($email)) {
            $email = Str::snake($firstname . ' ' . $lastname);
        }

        /** @var User $user */
        $user = User::factory()->create([
            'role' => 'medic',
            'firstname' => $firstname,
            'lastname' => $lastname,
            'email' => $email . '@medicare.com',
            'password' => Hash::make('secret123')
        ]);

        $settings = array_merge([
            'level_id' => $level,
            'specialty_id' => $specialty->id
        ], $extra);

        $user->settingsMedic()->create($settings);

        return $user;
    }

    /**
     * @param string $firstname
     * @param string $lastname
     * @param $email
     * @return User
     */
    private function createPatient(string $firstname, string $lastname, $gender, $birthday, $email = null)
    {
        if (is_null($email)) {
            $email = Str::snake($firstname . ' ' . $lastname);
        }

        $birthday = Carbon::createFromFormat('d/m/Y', $birthday);
        $pinGender = $gender == 'm' ? '1' : '2';
        $pin = $pinGender . $birthday->format('dmy') . $this->faker->numberBetween(100000, 999999);

        /** @var User $user */
        $user = User::factory()->create([
            'role' => 'patient',
            'firstname' => $firstname,
            'lastname' => $lastname,
            'email' => $email . '@medicare.com',
            'password' => Hash::make('secret123')
        ]);

        $user->settingsPatient()->create([
            'pin' => $pin,
            'birthday' => $birthday,
            'gender' => $gender,
            'country' => 'Romania',
            'county' => 'Timis',
            'city' => 'Timisoara',
            'address' => 'B-dul. Brăduțului nr. 6, bl. 9, ap. 47',
            'phone' => $this->faker->phoneNumber()
        ]);

        return $user;
    }


    private function createSpecialty(string $name)
    {
        return Specialty::factory()->create(['name' => $name]);
    }


    /**
     * @param User $medic
     * @param User $patient
     * @return Membership
     */
    private function createMembership(User $medic, User $patient)
    {
        return $medic->memberships()->create([ 'patient_id' => $patient->id ]);
    }

    /**
     * @param Membership $membership
     * @param string $date
     * @param bool|null $confirmed
     * @param bool $honored
     * @return Appointment
     */
    private function createAppointment(Membership $membership, string $date, ?bool $confirmed = null, bool $honored = false)
    {
        $date = $date . ':00';

        return $membership->appointments()->create([
            'date' => Carbon::createFromFormat('d/m/Y H:i:s', $date),
            'confirmed' => $confirmed,
            'honored' => $honored
        ]);
    }


    private function createVisit(Membership $membership, Appointment $appointment)
    {
        $membership->visits()->create([
            'date' => $appointment->date,
            'appointment_id' => $appointment->id
        ]);
    }


    private function createVisitAndRecord(Membership $membership, Appointment $appointment, array $record)
    {
        $visit = $membership->visits()->create([
            'date' => $appointment->date,
            'appointment_id' => $appointment->id
        ]);

        $record['date_processed'] = $appointment->date;

        $visit->record()->create($record);
    }
}
