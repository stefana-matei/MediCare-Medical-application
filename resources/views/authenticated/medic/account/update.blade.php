@extends('authenticated.medic.layouts.app')

@section('header')
    <h1 class="page-title">Administrare cont - Dr. {{ $user->name }}</h1>
@endsection

@section('main')
    <div class="row justify-content-center">
        <div class="col col-12 col-xl-8">
            <x-auth-validation-errors class="mb-4" :errors="$errors"/>

            <div class="form-group avatar-box d-flex align-items-center">
                <img src="{{ $user->avatar }}" width="100" height="100" alt="" class="rounded-500 me-4">

                <button class="btn btn-outline-primary" type="button" onclick="$('#avatarInput').click()">
                    Adaugă poză de profil<span class="btn-icon icofont-ui-user ms-2"></span>
                </button>

                <form class="d-none" id="avatarForm" action="{{ route('account.updateAvatar') }}" method="POST"
                      enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <input class="d-none" type="file" id="avatarInput" name="avatar"
                           onchange="$('#avatarForm').submit()">
                    <input class="btn btn-primary ms-3" type="submit" value="Salvează poza">
                </form>
            </div>

            <hr>

            <hr>

            <h4>Schimbă parola</h4>

            <form method="POST" action="{{ route('account.updatePassword') }}">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-12 col-sm-6">
                        <div class="form-group">
                            <label>Parolă veche</label>
                            <input name="old_password"  class="form-control" type="password" placeholder="Parolă veche">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 col-sm-6">
                        <div class="form-group">
                            <label>Parolă nouă</label>
                            <input name="password" class="form-control" type="password" placeholder="Parolă noua">
                        </div>
                    </div>

                    <div class="col-12 col-sm-6">
                        <div class="form-group">
                            <label>Confirmare parolă nouă</label>
                            <input name="password_confirmation" class="form-control" type="password" placeholder="Confirmare parola noua">
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-outline-dark">Salvează parola</button>
            </form>
        </div>
    </div>

@endsection
