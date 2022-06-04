@extends('authenticated.layouts.app')

@section('header')
    <h2>Consultatiile mele</h2>

@endsection

@section('main')

    <div class="d-flex justify-content-between">

        <form id="visits-search" class="{{ request()->has('medic') ? '' : 'customizable-placeholder' }} w-50">
            <div class="form-group mb-0">
                <select name="medic" class="selectpicker" data-live-search="true"
                        onchange="$('#visits-search').submit()">
                    <option></option>

                    @foreach($memberships as $membership)
                        <option value="{{ $membership->id }}"
                                {{ $membership->id == request('medic') ? 'selected' : '' }}
                                data-subtext="{{ $membership->medic->settingsMedic->specialty->name }}">{{ $membership->medic->name }}</option>
                    @endforeach

                </select>
            </div>
        </form>
    </div>

    <div class="page-content mt-5">
        <div class="row">
{{--            @each('authenticated.components.visit', $visits, 'visit')--}}
            @forelse($visits as $visit)
                @include('authenticated.components.visit', ['visit' => $visit])
            @empty
                <div class="alert alert-secondary with-before-icon" role="alert">
                    <div class="alert-icon"><i class="icofont-calendar"></i></div>
                    <div class="alert-content">Nu sunt consultatii!</div>
                </div>
            @endforelse
        </div>
    </div>
@endsection

