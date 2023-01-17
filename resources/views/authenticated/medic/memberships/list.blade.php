@extends('authenticated.medic.layouts.app')

@section('header')
    <h2>Pacienții mei</h2>
@endsection

@section('main')
    <p>Aici puteți vedea lista tuturor pacienților consultați.</p>

    <div class="page-content">
        <div class="row">
            @foreach($patients as $patient)
                @include('authenticated.components.patient', ['user' => $patient])
            @endforeach
        </div>
    </div>
@endsection
