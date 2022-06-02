@extends('auth.layouts.app')

@section('type', 'page-sign-in')

@section('main')
    <h2 class="h4 mt-0 mb-1">Autentificare</h2>
    <p class="text-muted">Conecteaza-te la contul tau</p>

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
                   placeholder="Parola"
                   name="password"
                   required
                   autocomplete="current-password">
        </div>

        <div class="form-check form-switch mb-4">
            <input type="checkbox" class="form-check-input" id="remember-me" name="remember" checked>
            <label class="form-check-label" for="remember-me">Tine-ma logat</label>
        </div>

        <div class="actions justify-content-between">
            <button type="submit" class="btn btn-primary">
                <span class="btn-icon icofont-login me-2"></span>
                Intra in cont
            </button>
        </div>
    </form>

    <p class="mt-5 mb-1"><a href="{{ route('password.request') }}">Ai uitat parola?</a></p>
    <p>Nu ai cont? <a href="{{ route('patient.registerView') }}">Creaza cont nou</a></p>
    <p>Esti medic? <a href="{{ route('medic.registerView') }}">Creaza cont de medic</a></p>
@endsection
