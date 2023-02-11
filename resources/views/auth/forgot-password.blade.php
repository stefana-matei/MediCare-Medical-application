@extends('auth.layouts.app')

@section('type', 'page-sign-in')

@section('main')
    <h2 class="h4 mt-0 mb-1">Resetează parola</h2>
    <p class="text-muted">Pentru setarea parole noi, te rugăm să introduci adresa de email</p>

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

        <div class="d-grid gap-2 col-6 mx-auto">
            <button type="submit" class="btn btn-primary">
                Resetează
            </button>
        </div>
    </form>

    <p class="mt-5">Ai deja cont? <a href="{{ route('login') }}">Conectează-te!</a></p>
@endsection
