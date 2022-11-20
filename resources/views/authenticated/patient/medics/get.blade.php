@extends('authenticated.layouts.app')

@section('header')
    <h2>{{ $medic->medicName }}</h2>

    <a href="#"
       class="btn btn-outline-primary align-self-center"
       role="button">
        Solicita programare
    </a>
@endsection

@section('main')
    <div class="row">
        @include('authenticated.components.medic', ['user' => $medic, 'showProfile' => false])


        <div class="col col-12 col-md-6">
            {{--            <div class="card">--}}
            {{--                <div class="card-header">--}}
            {{--                    Programeaza-te--}}
            {{--                </div>--}}
            {{--                <div class="card-body">--}}

            {{--                    <form id="appointment-create-form" method="POST" action="{{ route('appointments.create') }}">--}}
            {{--                        @csrf--}}

            {{--                        <input name="medic_id" type="hidden" value="{{ $medic->id }}">--}}

            {{--                        <x-appointment-time></x-appointment-time>--}}

            {{--                        <button class="btn btn-primary" type="submit">Solicita programare</button>--}}
            {{--                    </form>--}}

            {{--                </div>--}}
            {{--            </div>--}}

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
    </div>
@endsection
