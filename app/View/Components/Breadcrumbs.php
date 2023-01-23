<?php

namespace App\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\Routing\Router;
use Illuminate\View\Component;

class Breadcrumbs extends Component
{

    /**
     * Get the view / contents that represent the component.
     *
     * @return View
     */
    public function render()
    {
        $user = [
            'href' => '',
            'name' => 'Utilizator'
        ];

        // Patient
        $update = [
            'href' => route('account.updateView'),
            'name' => 'Date personale pacient'
        ];

        $dashboard = [
            'href' => route('dashboard'),
            'name' => 'Cont pacient'
        ];

        $home = [
            'href' => route('dashboard'),
            'name' => 'Home'
        ];

        $visits = [
            'href' => route('visits.list'),
            'name' => 'Consultații'
        ];

        $record = [
            'href' => route('visits.list'),
            'name' => 'Raportul consultației'
        ];

        $appointments = [
            'href' => route('appointments.list'),
            'name' => 'Programări'
        ];

        $appointmentsCreate = [
            'href' => route('appointments.create'),
            'name' => 'Programare nouă'
        ];

        $health = [
            'href' => route('medics.list'),
            'name' => 'Sănătate'
        ];

        $medics = [
            'href' => route('medics.list'),
            'name' => 'Medici'
        ];

        $medicProfile = [
            'href' => '',
            'name' => 'Profil medic'
        ];

        $patientMedics = [
            'href' => route('medics.myMedics'),
            'name' => 'Medicii mei'
        ];

        // Medic
        $medicDashboard = [
            'href' => route('medic.dashboard'),
            'name' => 'Cont medic'
        ];

        $medicHome = [
            'href' => route('medic.dashboard'),
            'name' => 'Home'
        ];

        $medicUpdate = [
            'href' => route('medic.updateView'),
            'name' => 'Date personale medic'
        ];

        $medicAppointments = [
            'href' => route('medic.appointments.list'),
            'name' => 'Programări'
        ];

        $medicAppointmentsUpdateView = [
            'href' => '',
            'name' => 'Actualizare programare'
        ];

        $medicPatients = [
            'href' => route('medic.patients.list'),
            'name' => 'Pacienții mei'
        ];

        $medicPatientsHistory = [
          'href' => '',
          'name' => 'Istoric pacient'
        ];



        $segments = match (request()->route()->getName()) {
            'account.updateView' => [$user, $update],
            'dashboard' => [$dashboard, $home],
            'visits.list' => [$dashboard, $visits],
            'visits.record.get' => [$dashboard, $visits, $record],
            'appointments.list' => [$dashboard, $appointments],
            'appointments.createView' => [$dashboard, $appointments, $appointmentsCreate],
            'medics.list' => [$health, $medics],
            'medics.get' => [$health, $medics, $medicProfile],
            'medics.myMedics' => [$dashboard, $patientMedics],
            'medic.dashboard' => [$medicDashboard, $medicHome],
            'medic.updateView' => [$medicDashboard, $user, $medicUpdate],
            'medic.appointments.list' => [$medicDashboard, $medicAppointments],
            'medic.appointments.updateView' => [$medicDashboard, $medicAppointments, $medicAppointmentsUpdateView],
            'medic.patients.list' => [$medicDashboard, $medicPatients],
            'medic.patients.history' => [$medicDashboard, $medicPatients, $medicPatientsHistory],
            default => []
        };

        return view('components.breadcrumbs', compact('segments'));
    }
}
