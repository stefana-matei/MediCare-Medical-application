@extends('authenticated.layouts.app')

@section('header')
    <h2>Medicii mei</h2>
@endsection

@section('main')
    <p>Aici poti vedea medicii pe care i-ai vizitat in trecut.</p>

    <div class="page-content">
        <div class="row">
            @foreach($medics as $medic)
                @include('authenticated.components.medic', ['user' => $medic])
            @endforeach
        </div>
    </div>

@endsection
