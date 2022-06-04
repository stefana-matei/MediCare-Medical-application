@extends('authenticated.layouts.app')

@section('header')
    <h2> Lista medici</h2>
@endsection

@section('main')
    <div class="row">
        @foreach($medics as $medic)
            @include('authenticated.components.medic', ['user' => $medic])
        @endforeach
    </div>
@endsection
