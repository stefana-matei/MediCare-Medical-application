@extends('authenticated.patient.layouts.app')

@section('head')
    @livewireStyles
@endsection

@section('scripts')
    @livewireScripts
@endsection

@section('header')
    <h2>Programare nouă</h2>
@endsection

@section('main')
    <livewire:create-appointments />
@endsection
