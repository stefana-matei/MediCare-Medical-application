@extends('auth.layouts.app')

@section('type', 'page-sign-up')

@section('main')
    <h2 class="h4 mt-0 mb-1">Inregistrare</h2>
    <p class="text-muted">Creeaza-ti contul MediCare</p>

    <form>
        <div class="form-group">
            <input class="form-control" type="text" placeholder="Nume">
        </div>

        <div class="form-group">
            <input class="form-control" type="text" placeholder="Prenume">
        </div>

        <div class="form-group">
            <input class="form-control" type="email" placeholder="Adresa de email">
        </div>

        <div class="form-group">
            <input class="form-control" type="password" placeholder="Parola">
        </div>

        <div class="form-check form-switch mb-4">
            <input type="checkbox" class="form-check-input" id="remember-me" checked>
            <label class="form-check-label" for="remember-me">Sunt de acord cu termenii si conditiile</label>
        </div>

        <div class="actions justify-content-between">
            <button class="btn btn-primary">
                <span class="btn-icon icofont-plus me-2"></span>Creeaza-ti cont
            </button>
        </div>
    </form>

    <p class="mt-5">Ai deja cont? <a href="{{ route('login') }}">Conecteaza-te!</a></p>
@endsection
