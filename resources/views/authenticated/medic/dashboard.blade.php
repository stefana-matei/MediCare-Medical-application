@php use App\Services\Auth; @endphp
@extends('authenticated.medic.layouts.app')

@section('head')
    @livewireStyles
@endsection

@section('scripts')
    @livewireScripts
@endsection

@section('header')
    <h2>Bine ați revenit, {{ Auth::user()->medicName }}</h2>
@endsection

@section('main')
    <livewire:medic-calendar/>
@endsection
