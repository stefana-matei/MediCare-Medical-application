@extends('authenticated.medic.layouts.app')

@section('head')
    @livewireStyles
@endsection

@section('scripts')
    @livewireScripts
@endsection

@section('header')
    <h2>Pacienții mei</h2>
@endsection

@section('main')
    <p>Aici puteți vedea lista tuturor pacienților pe care îi aveți în evidență.</p>

    <div class="d-flex align-items-center">
        <form id="my-patients-search"
              class="{{ request()->has('patient') ? '' : 'customizable-placeholder' }} search-height w-50">
            <div class="form-group mb-0">
                <select name="patient" class="selectpicker" data-live-search="true"
                        onchange="$('#my-patients-search').submit()">
                    <option></option>

                    @foreach($allPatients as $patient)
                        <option value="{{ $patient->id }}"
                                {{ $patient->id == request('patient') ? 'selected' : '' }}
                                data-subtext="{{ $patient->settingsPatient->pin }}">{{ $patient->name }}</option>
                    @endforeach

                </select>
            </div>
        </form>

        @if(request()->patient)
            <a class="btn btn-light btn-reset ms-3 shadow-none ps-3" href="{{ route('medic.patients.list') }}">
                <span class="btn-icon icofont-refresh fs-6 me-2"></span>
                Resetează
            </a>
        @endif

        <button type="button" class="btn btn-primary align-self-center ps-3 ms-auto" data-bs-toggle="modal" data-bs-target="#add-patient">
            <span class="btn-icon icofont-plus fs-6 me-3"></span>
            Adăugare pacient
        </button>
    </div>


    <div class="page-content mt-5">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th scope="col"></th>
                    <th scope="col">Nume</th>
                    <th scope="col">Cod numeric personal</th>
                    <th scope="col">Data nașterii</th>
                    <th scope="col">Telefon</th>
                    <th class="text-center" scope="col">Dosar medical</th>
                </tr>
                </thead>
                <tbody>
                @forelse($memberships as $membership)
                    <tr>
                        <td>
                            <img src="{{ $membership->patient->avatar }}" alt="" width="40" height="40" class="rounded-500">
                        </td>
                        <td>
                            <strong class="text-nowrap">{{ $membership->patient->name }}</strong><br>
                            <span class="text-muted">{{ $membership->patient->email }}</span>
                        </td>
                        <td>
                            <span>{{ $membership->patient->settingsPatient->pin }}</span>
                        </td>
                        <td>
                            <span
                                class="text-muted text-nowrap">{{ $membership->patient->settingsPatient->birthday->format('d.m.Y') }}</span><br>
                            <strong>{{ $membership->patient->settingsPatient->birthday->age }} ani</strong>
                        </td>
                        <td>
                            <div class="text-muted text-nowrap">{{ $membership->patient->settingsPatient->phone }}</div>
                        </td>
                        <td>
                            <div class="col-md-12 text-center">
                                <a href="{{ route('medic.patients.history', ['membershipId' => $membership->id]) }}" class="btn btn-primary btn-square rounded-pill">
                                    <span class="btn-icon icofont-ui-copy"></span>
                                </a>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6">
                            <span class="text-center d-block py-4 fw-bold">
                                <span class="icon sli-book-open text-muted fs-48 mb-2"></span><br>
                                Nu aveți pacienți în evidență!
                            </span>
                        </td>
                    </tr>
                @endforelse

                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('modals')
    <div class="modal fade" id="add-patient" tabindex="-1" aria-labelledby="add-patient" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Adăugare pacient</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <livewire:add-patient/>
                </div>
            </div>
        </div>
    </div>
@endsection
