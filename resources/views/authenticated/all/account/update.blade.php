@extends('authenticated.layouts.app')

@section('header')
    <h1 class="page-title">Informații personale</h1>
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
                           value="{{ old('lastname') ?? $user->lastname }}">
                </div>

                <div class="form-group">
                    <label>Prenume</label>
                    <input name="firstname" class="form-control" type="text" placeholder="Prenume" value="{{ old('firstname') ?? $user->firstname }}">
                </div>


                <div class="form-group">
                    <label>CNP</label>
                    <input name="pin" class="form-control" type="text" placeholder="CNP" value="{{ old('pin') ??  $user->settingsPatient->pin }}">
                </div>

                <div class="row">
                    <div class="col-12 col-sm-6">
                        <div class="form-group">
                            <label>Data nașterii</label>
                            <input name="birthday" class="form-control" type="date" placeholder="Data nașterii"
                                   value="{{ old('birthday') ??  $user->settingsPatient->birthday?->format('Y-m-d') }}">
                        </div>
                    </div>

                    <div class="col-12 col-sm-6">
                        <div class="form-group">
                            <label>Sex</label>
                            <select name="gender" class="selectpicker" title="Sex">
                                <option value="m" {{ (old('gender') ?? $user->settingsPatient->gender) == 'm' ? 'selected' : '' }}>
                                    Masculin
                                </option>
                                <option value="f" {{ (old('gender') ?? $user->settingsPatient->gender) == 'f' ? 'selected' : '' }}>
                                    Feminin
                                </option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label>Țară</label>
                    <input name="country" class="form-control" type="text" placeholder="Țară"
                           value="{{ old('country') ?? $user->settingsPatient->country }}">
                </div>

                <div class="form-group">
                    <label>Județ</label>
                    <input name="county" class="form-control" type="text" placeholder="Județ"
                           value="{{ old('county') ?? $user->settingsPatient->county }}">
                </div>

                <div class="form-group">
                    <label>Oraș</label>
                    <input name="city" class="form-control" type="text" placeholder="Oraș"
                           value="{{ old('city') ?? $user->settingsPatient->city }}">
                </div>

                <div class="form-group">
                    <label>Adresa completă</label>
                    <textarea name="address" class="form-control" placeholder="Adresa completă"
                              rows="2">{{ old('address') ?? $user->settingsPatient->address }}</textarea>
                </div>

                <div class="form-group">
                    <label>Număr de telefon</label>
                    <input name="phone" class="form-control" type="text" placeholder="Număr de telefon"
                           value="{{ old('phone') ?? $user->settingsPatient->phone }}">
                </div>

                <div class="form-group">
                    <label>Email</label>
                    <input name="email" class="form-control" type="text" placeholder="Email" value="{{ old('email') ?? $user->email }}">
                </div>


                <button type="submit" class="btn btn-success">Salvați modificările</button>
            </form>

            <hr>

            <h4>Schimbați parola</h4>

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
                            <input name="password" class="form-control" type="password" placeholder="Parolă nouă">
                        </div>
                    </div>

                    <div class="col-12 col-sm-6">
                        <div class="form-group">
                            <label>Confirmare parolă nouă</label>
                            <input name="password_confirmation" class="form-control" type="password" placeholder="Confirmare parola nouă">
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-outline-dark">Salvați parola</button>
            </form>
        </div>
    </div>

@endsection
