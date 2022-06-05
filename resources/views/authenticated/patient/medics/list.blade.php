@extends('authenticated.layouts.app')

@section('header')
    <h2> Lista medici</h2>
@endsection

@section('main')
    <div class="d-flex justify-content-between">
        <form id="medics-search" class="{{ request()->has('medic') ? '' : 'customizable-placeholder' }} search-height w-50">
            <div class="form-group mb-0">
                <select name="medic" class="selectpicker" data-live-search="true"
                        onchange="$('#medics-search').submit()">
                    <option></option>

                    @foreach($medics as $medic)
                        <option value="{{ $medic->id }}"
                                {{ $medic->id == request('medic') ? 'selected' : '' }}
                                data-subtext="{{ $medic->settingsMedic->specialty->name }}">{{ $medic->name }}</option>
                    @endforeach

                </select>
            </div>
        </form>
    </div>

    <div class="page-content mt-5">
        <div class="row">
            @foreach($medics as $medic)
                @include('authenticated.components.medic', ['user' => $medic])
            @endforeach
        </div>
    </div>

@endsection
