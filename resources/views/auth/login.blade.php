@extends('auth.layouts.app')

@section('type', 'page-sign-in')

@section('main')
    <h2 class="h4 mt-0 mb-1">Autentificare</h2>
    <p class="text-muted">Conectează-te la contul tău</p>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')"/>

    <!-- Validation Errors -->
    <x-auth-validation-errors class="mb-4" :errors="$errors"/>

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="form-group">
            <input class="form-control"
                   type="email"
                   placeholder="Email"
                   name="email"
                   value="{{ old('email') }}"
                   required
                   autofocus>
        </div>

        <div class="form-group">
            <input class="form-control"
                   type="password"
                   placeholder="Parolă"
                   name="password"
                   required
                   autocomplete="current-password">
        </div>

        <div class="actions justify-content-between">
            <button type="submit" class="btn btn-primary">
                <span class="btn-icon icofont-login me-2"></span>
                Intră in cont
            </button>
        </div>
    </form>

   <br>
   <br>
    <p class="mb-1">Nu ai cont? <a href="{{ route('patient.registerView') }}">Creează cont nou</a></p>
    <p>Ești medic? <a href="{{ route('medic.registerView') }}">Creează cont de medic</a></p>
    <p class="mb-1"><a href="{{ route('password.request') }}">Ai uitat parola?</a></p>
@endsection
