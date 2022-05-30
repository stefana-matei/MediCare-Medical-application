@extends('authenticated.layouts.app')

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Programarile mele
    </h2>

@endsection

@section('main')

    <div class="d-flex justify-content-between">

        <form id="appointments-search" class="{{ request()->has('medic') ? '' : 'customizable-placeholder' }} w-50">
            <div class="form-group mb-0">
                <select name="medic" class="selectpicker" data-live-search="true" onchange="$('#appointments-search').submit()">
                    <option></option>

                    @foreach($memberships as $membership)
                        <option value="{{ $membership->id }}" {{ $membership->id == request('medic') ? 'selected' : '' }}
                                data-subtext="{{ $membership->medic->settingsMedic->specialty->name }}">{{ $membership->medic->name }}</option>
                    @endforeach

                </select>
            </div>
        </form>


        <a href="{{ route('appointments.createView') }}"
           class="btn btn-primary align-self-center"
           role="button"
           data-bs-toggle="modal"
           data-bs-target="#add-appointment"
        >
            Programare noua
        </a>

    </div>

    <div class="page-content mt-5">
        <div class="row">
            @foreach($appointments as $appointment)
                <div class="col-12 col-md-4">
                    <div class="card text-center mb-5 bg-light">
                        <div class="card-header pt-4 fs-4">
                            <strong>{{ $appointment->date->format('d M Y H:i') }}</strong>
                        </div>

                        <div class="card-body">
                            <hr class="mt-0 mb-4">
                            <img src="{{ $appointment->membership->medic->avatar }}"
                                 alt="{{ $appointment->membership->medic->name }}" width="70" height="70"
                                 class="rounded-500 mb-4">
                            <div class="d-flex justify-content-center align-items-center">
                                <div class="fs-20" style="color: #1f4197; font-weight: bold">
                                    {{ $appointment->membership->medic->name }}
                                </div>
                            </div>

                            <div class="d-flex justify-content-center align-items-center">
                                <div class="text-muted">
                                    <p class="fs-20">{{ $appointment->membership->medic->settingsMedic->specialty->name }}</p>
                                    <p style="color: {{ $appointment->honored ? 'green' : 'red' }}">
                                        <strong>{{ $appointment->honored ? 'Onorata' : 'Neonorata' }}</strong></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

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
                            <select name="membership_id" class="selectpicker" data-live-search="true">
                                @foreach($memberships as $membership)
                                    <option value="{{ $membership->id }}"
                                            data-subtext="{{ $membership->medic->settingsMedic->specialty->name }}">{{ $membership->medic->name }}</option>
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
                            Cauta
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection






