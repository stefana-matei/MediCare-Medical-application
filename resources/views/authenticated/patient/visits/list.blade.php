@extends('authenticated.layouts.app')

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Consultatiile mele
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
    </div>




    <div class="page-content mt-5">
        <div class="row">
            @each('authenticated.components.visit', $visits, 'visit')
        </div>
    </div>
@endsection

