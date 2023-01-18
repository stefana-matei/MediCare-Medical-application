@extends('authenticated.medic.layouts.app')

@section('header')
    <h2> Programările mele</h2>
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
                                {{ $membership->id == request('patient') ? 'selected' : '' }}
                                data-subtext="{{ $membership->patient->settingsPatient->pin }}">{{ $membership->patient->name }}
                        </option>
                    @endforeach
                </select>
            </div>
        </form>

        @if(request()->patient)
            <a class="btn btn-light btn-reset ms-3 shadow-none ps-3" href="{{ route('medic.appointments.list') }}">
                <span class="btn-icon icofont-refresh fs-6 me-2"></span>
                Resetează
            </a>
        @endif

        <a href="{{ route('appointments.createView') }}" class="btn btn-primary align-self-center ps-3 ms-auto disabled">
            <span class="btn-icon icofont-plus fs-6 me-3"></span>
            Programare nouă
        </a>
    </div>

    <div class="page-content mt-5">
        <div class="mb-5">
            <h4>Programări în așteptare</h4>
            <div class="row">
                @if($pendingAppointments->isNotEmpty())
                @endif
                @forelse($pendingAppointments as $pendingAppointment)
                    @include('authenticated.medic.components.appointment', ['width' => 3, 'future' => true, 'appointment' => $pendingAppointment])
                @empty
                    <div class="col">
                        <div class="alert alert-secondary with-before-icon" role="alert">
                            <div class="alert-icon"><i class="icofont-calendar"></i></div>
                            <div class="alert-content">Nu aveți programări în așteptare!</div>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>

        <div class="mb-5">
            <h4>Programări viitoare</h4>
            <div class="row">
                @forelse($confirmedAppointments as $confirmedAppointment)
                    @include('authenticated.medic.components.appointment', ['width' => 3, 'future' => true, 'appointment' => $confirmedAppointment])
                @empty
                    <div class="col">
                        <div class="alert alert-secondary with-before-icon" role="alert">
                            <div class="alert-icon"><i class="icofont-calendar"></i></div>
                            <div class="alert-content">Nu aveți programări viitoare!</div>
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
                            <div class="alert-content">Nu aveți programări anterioare!</div>
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
                            <div class="alert-content">Nu aveți programări refuzate!</div>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
@endsection





