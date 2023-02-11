@extends('authenticated.patient.layouts.app')

@section('header')
    <h2>Medicii mei</h2>
@endsection

@section('main')
    <p>Aici puteți vedea medicii pe care i-ați vizitat în trecut.</p>

    <div class="d-flex align-items-center">
        <form id="my-medics-search"
              class="{{ request()->has('medic') ? '' : 'customizable-placeholder' }} search-height w-50">
            <div class="form-group mb-0">
                <select name="medic" class="selectpicker" data-live-search="true"
                        onchange="$('#my-medics-search').submit()">
                    <option></option>

                    @foreach($allMedics as $medic)
                        <option value="{{ $medic->id }}"
                                {{ $medic->id == request('medic') ? 'selected' : '' }}
                                data-subtext="{{ $medic->settingsMedic->specialty->name }}">{{ $medic->name }}</option>
                    @endforeach

                </select>
            </div>
        </form>

        @if(request()->medic)
            <a class="btn btn-light btn-reset ms-3 shadow-none ps-3" href="{{ route('medics.myMedics') }}">
                <span class="btn-icon icofont-refresh fs-6 me-2"></span>
                Resetează
            </a>
        @endif
    </div>

    <div class="page-content mt-5">
        <div class="row">
            @forelse($medics as $medic)
                @include('authenticated.patient.components.medic', ['user' => $medic])
            @empty
                <div class="col">
                    <div class="alert alert-secondary with-before-icon" role="alert">
                        <div class="alert-icon"><i class="icofont-stethoscope-alt"></i></div>
                        <div class="alert-content">Nu sunt medici pe care i-ați vizitat!</div>
                    </div>
                </div>
            @endforelse
        </div>
    </div>
@endsection
