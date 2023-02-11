@extends('auth.layouts.app')

@section('type', 'page-sign-up')

@section('main')
    <h2 class="h4 mt-0 mb-1">Înregistrare medic</h2>
    <p class="text-muted">Creează-ți contul MediCare</p>

    <!-- Validation Errors -->
    <x-auth-validation-errors class="mb-4" :errors="$errors"/>

    <form method="POST" action="{{ route('medic.register') }}">
        @csrf

        <div class="form-group">
            <input class="form-control"
                   name="email"
                   type="email"
                   value="{{ old('email') }}"
                   placeholder="Adresă de email"
                   required>
        </div>

        <div class="form-group">
            <input class="form-control"
                   name="password"
                   type="password"
                   placeholder="Parolă"
                   autocomplete="new-password"
                   required>
        </div>

        <div class="form-group mb-5">
            <input class="form-control"
                   name="password_confirmation"
                   type="password"
                   placeholder="Confirmare parolă"
                   required>
        </div>


        <div class="actions justify-content-between">
            <button class="btn btn-primary">
                <span class="btn-icon icofont-plus me-2"></span>Creează-ți cont
            </button>
        </div>
    </form>

    <p class="mt-5">Ai deja cont? <a href="{{ route('login') }}">Conectează-te!</a></p>
@endsection
