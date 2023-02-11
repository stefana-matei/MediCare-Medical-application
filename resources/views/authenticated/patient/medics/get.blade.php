@extends('authenticated.patient.layouts.app')


@section('header')
    <h2>Profil medic</h2>

    <a href="#"
       class="btn btn-outline-primary align-self-center"
       role="button" data-bs-toggle="modal" data-bs-target="#createAppointment">
        Solicită programare
    </a>
@endsection

@section('main')
    <div class="row">
        @include('authenticated.patient.components.medic', ['user' => $medic, 'showProfile' => false])

        <div class="col col-12 col-md-6">
            @include('authenticated.patient.components.medic-profile-section', ['title' => 'Specializare', 'value' => $medic->settingsMedic->specialisation])
            @include('authenticated.patient.components.medic-profile-section', ['title' => 'Competențe', 'value' => $medic->settingsMedic->skills])
            @include('authenticated.patient.components.medic-profile-section', ['title' => 'Domenii de activitate', 'value' => $medic->settingsMedic->areas_of_activity])
            @include('authenticated.patient.components.medic-profile-section', ['title' => 'Educație', 'value' => $medic->settingsMedic->education])
            @include('authenticated.patient.components.medic-profile-section', ['title' => 'Cursuri postuniversitare', 'value' => $medic->settingsMedic->postgraduate_courses])
            @include('authenticated.patient.components.medic-profile-section', ['title' => 'Traininguri', 'value' => $medic->settingsMedic->trainings])
            @include('authenticated.patient.components.medic-profile-section', ['title' => 'Certificări internaționale', 'value' => $medic->settingsMedic->international_certifications])
            @include('authenticated.patient.components.medic-profile-section', ['title' => 'Publicații', 'value' => $medic->settingsMedic->publications])
            @include('authenticated.patient.components.medic-profile-section', ['title' => 'Membru în', 'value' => $medic->settingsMedic->member])
            @include('authenticated.patient.components.medic-profile-section', ['title' => 'Alte realizări', 'value' => $medic->settingsMedic->other_realizations])
        </div>

        <div class="modal fade" id="createAppointment" tabindex="-1" aria-labelledby="createAppointment"
             aria-hidden="true">
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
