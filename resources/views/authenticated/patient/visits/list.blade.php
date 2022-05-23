@extends('authenticated.layouts.app')

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Consultatiile mele
    </h2>

@endsection

@section('main')
    <div class="page-content mt-5">
        <div class="row">
            @each('authenticated.components.visit', $visits, 'visit')
        </div>
    </div>
@endsection

