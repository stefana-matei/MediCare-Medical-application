@extends('authenticated.medic.layouts.app')

@section('head')
    @livewireStyles
@endsection

@section('scripts')
    @livewireScripts
@endsection

@section('header')
    <h2>Programare {{ $appointment->membership->patient->name }} - {{ $appointment->date->format('d.m.Y') }}</h2>
@endsection

@section('main')
    <livewire:update-appointment :appointment="$appointment"/>
@endsection





