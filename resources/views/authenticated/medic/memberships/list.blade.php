@extends('authenticated.medic.layouts.app')

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
            <a class="btn btn-light btn-reset ms-3 shadow-none ps-3" href="{{ route('patients.myPatients') }}">
                <span class="btn-icon icofont-refresh fs-6 me-2"></span>
                Resetează
            </a>
        @endif

        <a href="{{ route('appointments.createView') }}"
           class="btn btn-primary align-self-center ps-3 ms-auto disabled">
            <span class="btn-icon icofont-plus fs-6 me-3"></span>
            Adăugare pacient
        </a>
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
                </tr>
                </thead>
                <tbody>
                @forelse($patients as $patient)
                    <tr>
                        <td>
                            <img src="{{$patient->avatar}}" alt="" width="40" height="40" class="rounded-500">
                        </td>
                        <td>
                            <strong class="text-nowrap">{{$patient->name}}</strong><br>
                            <span class="text-muted">{{$patient->email}}</span>
                        </td>
                        <td>
                            <span>{{ $patient->settingsPatient->pin }}</span>
                        </td>
                        <td>
                            <span
                                class="text-muted text-nowrap">{{$patient->settingsPatient->birthday->format('d.m.Y')}}</span><br>
                            <strong>{{$patient->settingsPatient->birthday->age}} ani</strong>
                        </td>
                        <td>
                            <div class="text-muted text-nowrap">{{$patient->settingsPatient->phone}}</div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5">
                            <span class="text-center d-block py-4">
                                <span class="icon sli-book-open text-muted fs-48 mb-2"></span><br>
                                <strong>Nu aveti pacienti in evidenta!</strong>
                            </span>

                        </td>
                    </tr>
                @endforelse

                </tbody>
            </table>
        </div>

        {{--        <div class="row">--}}
        {{--            @foreach($patients as $patient)--}}
        {{--                @include('authenticated.components.patient', ['user' => $patient])--}}
        {{--            @endforeach--}}
        {{--        </div>--}}
    </div>
@endsection
