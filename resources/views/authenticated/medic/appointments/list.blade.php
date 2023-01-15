@extends('authenticated.medic.layouts.app')

@section('header')
    <h2> Programarile mele</h2>
@endsection

@section('main')

    <div class="d-flex align-items-center">
        <form id="medic-appointments-search"
              class="{{ request()->has('patient') ? '' : 'customizable-placeholder' }} search-height w-50">
            <div class="form-group mb-0">
                <select name="patient" class="selectpicker" data-live-search="true"
                        onchange="$('#medic-appointments-search').submit()">
                    <option></option>

                    @foreach($memberships as $membership)
                        <option value="{{ $membership->id }}"
                            {{ $membership->id == request('patient') ? 'selected' : '' }}>
                            {{ $membership->patient->name }}
                        </option>
                    @endforeach
                </select>
            </div>
        </form>

        @if(request()->patient)
            <a class="btn btn-light btn-reset ms-3 shadow-none ps-3" href="{{ route('medic.appointments.list') }}">
                <span class="btn-icon icofont-refresh fs-6 me-2"></span>
                Reseteaza
            </a>
        @endif

        <a href="{{ route('appointments.createView') }}" class="btn btn-primary align-self-center ps-3 ms-auto">
            <span class="btn-icon icofont-plus fs-6 me-3"></span>
            Programare noua
        </a>
    </div>

    <div class="page-content mt-5">
        <div class="mb-5">
            <h4>Programari in asteptare</h4>
            <div class="row">
                @if($pendingAppointments->isNotEmpty())
                @endif
                @forelse($pendingAppointments as $pendingAppointment)
                    @include('authenticated.medic.components.appointment', ['width' => 3, 'future' => true, 'appointment' => $pendingAppointment])
                @empty
                    <div class="col">
                        <div class="alert alert-secondary with-before-icon" role="alert">
                            <div class="alert-icon"><i class="icofont-calendar"></i></div>
                            <div class="alert-content">Nu aveti programari in asteptare!</div>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>

        <div class="mb-5">
            <h4>Programari viitoare</h4>
            <div class="row">
                @forelse($confirmedAppointments as $confirmedAppointment)
                    @include('authenticated.medic.components.appointment', ['width' => 3, 'future' => true, 'appointment' => $confirmedAppointment])
                @empty
                    <div class="col">
                        <div class="alert alert-secondary with-before-icon" role="alert">
                            <div class="alert-icon"><i class="icofont-calendar"></i></div>
                            <div class="alert-content">Nu aveti programari viitoare!</div>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>

        <div>
            <h4>Programari anterioare</h4>
            <div class="row">
                @forelse($appointments as $appointment)
                    @include('authenticated.medic.components.appointment', ['width' => 3, 'appointment' => $appointment])
                @empty
                    <div class="col">
                        <div class="alert alert-secondary with-before-icon" role="alert">
                            <div class="alert-icon"><i class="icofont-calendar"></i></div>
                            <div class="alert-content">Nu sunt programari anterioare!</div>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>

        <div class="mb-5">
            <h4>Programari refuzate</h4>
            <div class="row">
                @forelse($canceledAppointments as $canceledAppointment)
                    @include('authenticated.medic.components.appointment', ['width' => 3, 'appointment' => $canceledAppointment])
                @empty
                    <div class="col">
                        <div class="alert alert-secondary with-before-icon" role="alert">
                            <div class="alert-icon"><i class="icofont-calendar"></i></div>
                            <div class="alert-content">Nu aveti programari refuzate!</div>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>

    </div>
@endsection





