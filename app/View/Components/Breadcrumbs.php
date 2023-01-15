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

        $update = [
            'href' => route('account.updateView'),
            'name' => 'Date personale'
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
            'name' => 'Consultatii'
        ];

        $record = [
            'href' => route('visits.list'),
            'name' => 'Raportul consultatiei'
        ];

        $appointments = [
            'href' => route('appointments.list'),
            'name' => 'Programari'
        ];

        $appointmentsCreate = [
            'href' => route('appointments.create'),
            'name' => 'Programare noua'
        ];

        $health = [
            'href' => route('medics.list'),
            'name' => 'Sanatate'
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
            default => []
        };

        return view('components.breadcrumbs', compact('segments'));
    }
}
