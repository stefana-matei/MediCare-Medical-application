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

        $services = [
            'href' => route('services.list'),
            'name' => 'Servicii'
        ];



        $segments = match (request()->route()->getName()) {
            'account.updateView' => [$user, $update],
            'dashboard' => [$dashboard, $home],
            'visits.list' => [$dashboard, $visits],
            'visits.record.get' => [$dashboard, $visits, $record],
            'appointments.list' => [$dashboard, $appointments],
            'medics.list' => [$health, $medics],
            'medics.get' => [$health, $medics, $medicProfile],
            'services.list' => [$health, $services],
            default => []
        };

        return view('components.breadcrumbs', compact('segments'));
    }
}
