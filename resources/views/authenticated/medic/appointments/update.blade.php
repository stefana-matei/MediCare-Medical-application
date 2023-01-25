@extends('authenticated.medic.layouts.app')

@section('head')
    @livewireStyles
@endsection

@section('scripts')
    @livewireScripts
@endsection

@section('header')
    <h2> Editare programare din data de {{ $appointment->date->format('d.m.Y') }}</h2>
@endsection

@section('main')
    <h4>Pacient - {{ $appointment->membership->patient->name }}</h4>
    <h4></h4>
    <livewire:update-appointment :appointment="$appointment"/>
@endsection





