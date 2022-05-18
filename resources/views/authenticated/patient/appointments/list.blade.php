@extends('authenticated.layouts.app')

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Programarile mele
    </h2>

    <a href="{{ route('appointments.createView') }}" class="btn btn-primary align-self-center" role="button">
        Programare online
    </a>
@endsection

@section('main')
    <div class="page-content mt-5">
        <div class="row">
            @foreach($appointments as $appointment)
                <div class="col-12 col-md-4">
                    <div class="card text-center mb-5 bg-light">
                        <div class="card-header fs-4">
                            <strong>{{ $appointment->date->format('d M Y H:i') }}</strong>
                        </div>

                        <div class="card-body">
                            <hr class="mt-4 mb-4">
                            <img src="{{ asset('assets/content/user-400-4.jpg') }}" alt="{{ $appointment->membership->medic->name }}" width="70" height="70" class="rounded-500 mb-4">
                            <div class="d-flex justify-content-center align-items-center">
                                <div class="fs-20" style="color: #1f4197; font-weight: bold">
                                    {{ $appointment->membership->medic->name }}
                                </div>
                            </div>

                            <div class="d-flex justify-content-center align-items-center">
                                <div class="text-muted">
                                    <p class="fs-20">{{ $appointment->specialty }}</p>
                                    <p style="color: {{ $appointment->honored ? 'green' : 'red' }}"><strong>{{ $appointment->honored ? 'Onorata' : 'Neonorata' }}</strong> </p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
@endsection






