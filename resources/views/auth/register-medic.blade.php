@extends('auth.layouts.app')

@section('type', 'page-sign-up')

@section('main')
    <h2 class="h4 mt-0 mb-1">Inregistrare medic</h2>
    <p class="text-muted">Creeaza-ti contul MediCare</p>

    <!-- Validation Errors -->
    <x-auth-validation-errors class="mb-4" :errors="$errors" />

    <form method="POST" action="{{ route('medic.register') }}">
        @csrf

        <div class="form-group">
            <input class="form-control"
                   name="email"
                   type="email"
                   value="{{ old('email') }}"
                   placeholder="Adresa de email"
                   required>
        </div>

        <div class="form-group">
            <input class="form-control"
                   name="password"
                   type="password"
                   placeholder="Parola"
                   autocomplete="new-password"
                   required>
        </div>

        <div class="form-group mb-5">
            <input class="form-control"
                   name="password_confirmation"
                   type="password"
                   placeholder="Confirmare parola"
                   required>
        </div>


        <div class="actions justify-content-between">
            <button class="btn btn-primary">
                <span class="btn-icon icofont-plus me-2"></span>Creeaza-ti cont
            </button>
        </div>
    </form>

    <p class="mt-5">Ai deja cont? <a href="{{ route('login') }}">Conecteaza-te!</a></p>
@endsection
