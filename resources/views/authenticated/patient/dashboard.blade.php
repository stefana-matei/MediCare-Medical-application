@extends('authenticated.layouts.app')

@section('head')
    @livewireStyles
@endsection

@section('scripts')
    @livewireScripts
@endsection

{{--@section('header')--}}
{{--    <h2 class="page-title">Pagina principala</h2>--}}
{{--@endsection--}}

@section('main')
    <div class="row">
        <div class="col-8 pe-4">
            <h3>
                Programari planificate

                <a href="{{ route('appointments.list') }}" type="button" class="btn btn-outline-primary btn-mini ms-3 float-end">
                    Toate programarile
                </a>
            </h3>
            <div class="row">
                @forelse($futureAppointments as $futureAppointment)
                    @include('authenticated.components.appointment', ['future' => true, 'appointment' => $futureAppointment])
                @empty
                    <div class="col">
                        <div class="alert alert-secondary with-before-icon" role="alert">
                            <div class="alert-icon"><i class="icofont-calendar"></i></div>
                            <div class="alert-content">Nu sunt programari planificate!</div>
                        </div>
                    </div>
                @endforelse
            </div>

            <h3>
                Ultimele consultatii

                <a href="{{ route('visits.list') }}" type="button" class="btn btn-outline-primary btn-mini float-end">
                    Toate consultatiile
                </a>
            </h3>
            <div class="row">
                @forelse($visits as $visit)
                    @include('authenticated.components.visit', ['visit' => $visit, 'width' => 6])
                @empty
                    <div class="col">
                        <div class="alert alert-secondary with-before-icon" role="alert">
                            <div class="alert-icon"><i class="icofont-calendar"></i></div>
                            <div class="alert-content">Nu sunt consultatii!</div>
                        </div>
                    </div>
                @endforelse
            </div>

        </div>

        <div class="col-4 ps-4">
            <h3>Solicita o programare</h3>
            <livewire:calendar />
        </div>


    </div>
@endsection
