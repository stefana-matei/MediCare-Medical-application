@extends('authenticated.layouts.app')

@section('header')
    <h2>Medicii mei</h2>
@endsection

@section('main')
    <p>Aici puteți vedea medicii pe care i-ați vizitat în trecut.</p>

    <div class="page-content">
        <div class="row">
            @forelse($medics as $medic)
                @include('authenticated.components.medic', ['user' => $medic])
            @empty
                <div class="col">
                    <div class="alert alert-secondary with-before-icon" role="alert">
                        <div class="alert-icon"><i class="icofont-stethoscope-alt"></i></div>
                        <div class="alert-content">Nu sunt medici pe care i-ați vizitat!</div>
                    </div>
                </div>
            @endforelse
        </div>
    </div>
@endsection
