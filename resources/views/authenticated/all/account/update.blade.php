@extends('authenticated.layouts.app')

@section('header')
    <h1 class="page-title">Modificare date personale</h1>
@endsection

@section('main')
    <div class="row justify-content-center">
        <div class="col col-12 col-xl-8">
            <x-auth-validation-errors class="mb-4" :errors="$errors"/>

            <div class="form-group avatar-box d-flex align-items-center">
                <img src="{{ $user->avatar }}" width="100" height="100" alt="" class="rounded-500 me-4">

                <button class="btn btn-outline-primary" type="button" onclick="$('#avatarInput').click()">
                    Adauga poza de profil<span class="btn-icon icofont-ui-user ms-2"></span>
                </button>

                <form class="d-none" id="avatarForm" action="{{ route('account.updateAvatar') }}" method="POST"
                      enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <input class="d-none" type="file" id="avatarInput" name="avatar"
                           onchange="$('#avatarForm').submit()">
                    <input class="btn btn-primary ms-3" type="submit" value="Salveaza poza">

                </form>
            </div>

            <hr>


            <form class="mb-4" method="POST" action="{{ route('account.update') }}">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label>Nume de familie</label>
                    <input name="lastname" class="form-control" type="text" placeholder="Nume de familie"
                           value="{{ $user->lastname }}">
                </div>

                <div class="form-group">
                    <label>Prenume</label>
                    <input name="firstname" class="form-control" type="text" placeholder="Prenume" value="{{ $user->firstname }}">
                </div>


                <div class="form-group">
                    <label>CNP</label>
                    <input name="cnp" class="form-control" type="text" placeholder="CNP" value="{{ $user->settingsPatient->cnp }}">
                </div>

                <div class="row">
                    <div class="col-12 col-sm-6">
                        <div class="form-group">
                            <label>Data nasterii</label>
                            <input name="birthday" class="form-control" type="date" placeholder="Data nasterii"
                                   value="{{ $user->settingsPatient->birthday->format('Y-m-d') }}">
                        </div>
                    </div>

                    <div class="col-12 col-sm-6">
                        <div class="form-group">
                            <label>Sex</label>
                            <select name="gender" class="selectpicker" title="Sex">
                                <option value="m" {{ $user->settingsPatient->gender == 'm' ? 'selected' : '' }}>
                                    Masculin
                                </option>
                                <option value="f" {{ $user->settingsPatient->gender == 'f' ? 'selected' : '' }}>
                                    Feminin
                                </option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label>Tara</label>
                    <input name="country" class="form-control" type="text" placeholder="Tara"
                           value="{{ $user->settingsPatient->country }}">
                </div>

                <div class="form-group">
                    <label>Judet</label>
                    <input name="county" class="form-control" type="text" placeholder="Judet"
                           value="{{ $user->settingsPatient->county }}">
                </div>

                <div class="form-group">
                    <label>Oras</label>
                    <input name="city" class="form-control" type="text" placeholder="Oras"
                           value="{{ $user->settingsPatient->city }}">
                </div>

                <div class="form-group">
                    <label>Adresa completa</label>
                    <textarea name="address" class="form-control" placeholder="Adresa completa"
                              rows="2">{{ $user->settingsPatient->address }}</textarea>
                </div>

                <div class="form-group">
                    <label>Numar de telefon</label>
                    <input name="phone" class="form-control" type="text" placeholder="Numar de telefon"
                           value="{{ $user->settingsPatient->phone }}">
                </div>

                <div class="form-group">
                    <label>Email</label>
                    <input name="email" class="form-control" type="text" placeholder="Email" value="{{ $user->email }}">
                </div>


                <button type="submit" class="btn btn-success">Salveaza modificarile</button>
            </form>

            <hr>

            <h4>Schimba parola</h4>

            <form method="POST" action="{{ route('account.updatePassword') }}">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-12 col-sm-6">
                        <div class="form-group">
                            <label>Parola veche</label>
                            <input name="old_password"  class="form-control" type="password" placeholder="Parola veche">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 col-sm-6">
                        <div class="form-group">
                            <label>Parola noua</label>
                            <input name="password" class="form-control" type="password" placeholder="Parola noua">
                        </div>
                    </div>

                    <div class="col-12 col-sm-6">
                        <div class="form-group">
                            <label>Confirmare parola noua</label>
                            <input name="password_confirmation" class="form-control" type="password" placeholder="Confirmare parola noua">
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-outline-dark">Salveaza parola</button>
            </form>
        </div>
    </div>

@endsection
