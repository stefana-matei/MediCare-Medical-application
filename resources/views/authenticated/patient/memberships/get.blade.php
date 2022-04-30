@extends('authenticated.layouts.app')

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Get Membership
    </h2>
@endsection

@section('main')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <p><strong>Medic:</strong> {{ $membership->medic->name }} #{{$membership->medic_id}}</p>
                <p><strong>Patient:</strong> {{ $membership->patient->name }} #{{$membership->patient_id}}</p>
            </div>
        </div>
    </div>
</div>
@endsection
