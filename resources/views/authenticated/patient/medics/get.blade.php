@extends('authenticated.layouts.app')


@section('header')
    <h2>Profil medic</h2>

    <a href="#"
       class="btn btn-outline-primary align-self-center"
       role="button" data-bs-toggle="modal" data-bs-target="#createAppointment">
        Solicita programare
    </a>
@endsection

@section('main')
    <div class="row">
        @include('authenticated.components.medic', ['user' => $medic, 'showProfile' => false])

        <div class="col col-12 col-md-6">
            @include('authenticated.components.medic-profile-section', ['title' => 'Specializare', 'value' => $medic->settingsMedic->specialisation])
            @include('authenticated.components.medic-profile-section', ['title' => 'Competente', 'value' => $medic->settingsMedic->skills])
            @include('authenticated.components.medic-profile-section', ['title' => 'Domenii de activitate', 'value' => $medic->settingsMedic->areas_of_activity])
            @include('authenticated.components.medic-profile-section', ['title' => 'Educatie', 'value' => $medic->settingsMedic->education])
            @include('authenticated.components.medic-profile-section', ['title' => 'Cursuri postuniversitare', 'value' => $medic->settingsMedic->postgraduate_courses])
            @include('authenticated.components.medic-profile-section', ['title' => 'Traininguri', 'value' => $medic->settingsMedic->trainings])
            @include('authenticated.components.medic-profile-section', ['title' => 'Certificari internationale', 'value' => $medic->settingsMedic->international_certifications])
            @include('authenticated.components.medic-profile-section', ['title' => 'Publicatii', 'value' => $medic->settingsMedic->publications])
            @include('authenticated.components.medic-profile-section', ['title' => 'Membru in', 'value' => $medic->settingsMedic->member])
            @include('authenticated.components.medic-profile-section', ['title' => 'Alte realizari', 'value' => $medic->settingsMedic->other_realizations])
        </div>

        <div class="modal fade" id="createAppointment" tabindex="-1" aria-labelledby="createAppointment" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <livewire:create-medic-appointment :medic="$medic"/>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('head')
    @livewireStyles
@endsection

@section('scripts')
    @livewireScripts
@endsection
