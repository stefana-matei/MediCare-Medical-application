@extends('authenticated.medic.layouts.app')

@section('main')
    <div class="row">
        <div class="col-8 pe-4">
            <h3>
                Programări planificate

                <a href="{{ route('medic.appointments.list') }}" type="button"
                   class="btn btn-outline-primary btn-mini ms-3 float-end">
                    Toate programările
                </a>
            </h3>
            <div class="row">
                @forelse($appointments as $appointment)
                    @include('authenticated.medic.components.appointment', ['future' => true, 'appointment' => $appointment])
                @empty
                    <div class="col">
                        <div class="alert alert-secondary with-before-icon" role="alert">
                            <div class="alert-icon"><i class="icofont-calendar"></i></div>
                            <div class="alert-content">Nu aveți programări viitoare!</div>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>

        <div class="col-4 ps-4">
            <h3>Sidebar</h3>
        </div>
    </div>
@endsection
