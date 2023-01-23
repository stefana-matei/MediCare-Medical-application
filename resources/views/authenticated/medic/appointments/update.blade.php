@extends('authenticated.medic.layouts.app')

@section('header')
    <h2>Actualizare programare </h2>
@endsection

@section('main')

    <form action="{{ route('medic.appointments.update', ['id' => $appointment->id]) }}" method="POST">
        @csrf
        @method('PUT')

{{--        <div class="form-group">--}}
{{--            <label>First name</label>--}}
{{--            <input class="form-control" type="text" placeholder="Type first name...">--}}
{{--        </div>--}}

        <div class="form-group">
            <label>Status programare</label>
            <div>
                <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                    <input type="radio" class="btn-check" name="confirmed" value="null" id="confirmed_pending" autocomplete="off" {{ $appointment->confirmed === null ? 'checked' : ''}}>
                    <label class="btn btn-outline-primary" for="confirmed_pending">In asteptare</label>

                    <input type="radio" class="btn-check" name="confirmed" value="1" id="confirmed_yes" autocomplete="off" {{ $appointment->confirmed === 1 ? 'checked' : ''}}>
                    <label class="btn btn-outline-primary" for="confirmed_yes">Confirmata</label>

                    <input type="radio" class="btn-check" name="confirmed" value="0" id="confirmed_no" autocomplete="off" {{ $appointment->confirmed === 0 ? 'checked' : ''}}>
                    <label class="btn btn-outline-primary" for="confirmed_no">Refuzata</label>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label>Onorata</label>
            <div>
                <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                    <input type="radio" class="btn-check" name="honored" value="1" id="honored_yes" autocomplete="off" {{ $appointment->honored ? 'checked' : ''}}>
                    <label class="btn btn-outline-primary" for="honored_yes">Onorata</label>

                    <input type="radio" class="btn-check" name="honored" value="0" id="honored_no" autocomplete="off" {{ !$appointment->honored ? 'checked' : ''}}>
                    <label class="btn btn-outline-primary" for="honored_no">Neonorata</label>
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Trimite actualizarea</button>
    </form>
@endsection





