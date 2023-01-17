@extends('authenticated.layouts.app')

@section('header')
    <h2>Listă medici</h2>
@endsection

@section('main')
    <div class="d-flex align-items-center">
        <form id="medics-search" class="{{ request()->has('medic') ? '' : 'customizable-placeholder' }} search-height w-50">
            <div class="form-group mb-0">
                <select name="medic" class="selectpicker" data-live-search="true"
                        onchange="$('#medics-search').submit()">
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
            <a class="btn btn-light btn-reset ms-3 shadow-none ps-3" href="{{ route('medics.list') }}">
                <span class="btn-icon icofont-refresh fs-6 me-2"></span>
                Resetează
            </a>
        @endif
    </div>

    <div class="page-content mt-5">
        <div class="row">
            @foreach($medics as $medic)
                @include('authenticated.components.medic', ['user' => $medic])
            @endforeach
        </div>
    </div>

@endsection
