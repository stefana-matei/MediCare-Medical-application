@extends('authenticated.layouts.app')

@section('header')
    <h2> Programarile mele</h2>
@endsection

@section('main')

    <div class="d-flex justify-content-between">

        <form id="appointments-search" class="{{ request()->has('medic') ? '' : 'customizable-placeholder' }} w-50">
            <div class="form-group mb-0">
                <select name="medic" class="selectpicker" data-live-search="true"
                        onchange="$('#appointments-search').submit()">
                    <option></option>

                    @foreach($memberships as $membership)
                        <option value="{{ $membership->id }}"
                                {{ $membership->id == request('medic') ? 'selected' : '' }}
                                data-subtext="{{ $membership->medic->settingsMedic->specialty->name }}">{{ $membership->medic->name }}</option>
                    @endforeach

                </select>
            </div>
        </form>


        <a href="{{ route('appointments.createView') }}"
           class="btn btn-primary align-self-center ps-3"
           role="button"
           data-bs-toggle="modal"
           data-bs-target="#add-appointment">
            <span class="btn-icon icofont-plus fs-6 me-3"></span>
            Programare noua
        </a>

    </div>

    <div class="page-content mt-5">
        <div class="mb-5">
            <h4>Programari viitoare</h4>
            <div class="row">
                @forelse($futureAppointments as $futureAppointment)
                    @include('authenticated.components.appointment', ['future' => true, 'appointment' => $futureAppointment])
                @empty
                    <div class="alert alert-secondary with-before-icon" role="alert">
                        <div class="alert-icon"><i class="icofont-calendar"></i></div>
                        <div class="alert-content">Nu aveti programari planificate!</div>
                    </div>
                @endforelse
            </div>
        </div>
        <div>
            <h4>Programari anterioare</h4>
            <div class="row">
                @forelse($appointments as $appointment)
                    @include('authenticated.components.appointment', ['appointment' => $appointment])
                @empty
                    <div class="alert alert-secondary with-before-icon" role="alert">
                        <div class="alert-icon"><i class="icofont-calendar"></i></div>
                        <div class="alert-content">Nu aveti programari anterioare!</div>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
@endsection

@section('modals')
    <div class="modal fade" id="add-appointment" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Programare noua</h5>
                </div>
                <div class="modal-body">

                    <form id="appointment-create-form" method="POST" action="{{ route('appointments.create') }}">
                        @csrf

                        <div class="form-group">
                            <label>Medic, Specialitatea</label>
                            <select name="medic_id" class="selectpicker" data-live-search="true">
                                @foreach($medics as $medic)
                                    <option value="{{ $medic->id }}"
                                            data-subtext="{{ $medic->settingsMedic->specialty->name }}">{{ $medic->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Data</label>
                            <input name="date" class="form-control" type="date" placeholder="Data programarii"
                                   value="{{ now()->format('Y-m-d') }}">
                        </div>
                    </form>


                </div>
                <div class="modal-footer d-block">
                    <div class="actions justify-content-between">
                        <button type="button" class="btn btn-error" data-bs-dismiss="modal">Anuleaza</button>
                        <button type="button" class="btn btn-info" onclick="$('#appointment-create-form').submit()">
                            Adauga
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection






