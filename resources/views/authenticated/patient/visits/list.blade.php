@extends('authenticated.layouts.app')

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Consultatiile mele
    </h2>

    <a href="{{ route('visits.createView') }}" class="btn btn-primary align-self-center " role="button">
        Adauga consultatie
    </a>
@endsection

@section('main')
    <div class="page-content mt-5">
        <div class="row">
            @each('authenticated.components.visit', $visits, 'visit')
        </div>
    </div>
@endsection

