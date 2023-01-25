@extends('authenticated.medic.layouts.app')

@section('header')
    <h1 class="page-title">Administrare cont - {{ $user->medicName }}</h1>
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

            <form class="mb-4" method="POST" action="{{ route('medic.account.update') }}">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label>Nume de familie</label>
                    <input name="lastname" class="form-control" type="text" placeholder="Nume de familie"
                           value="{{ old('lastname') ?? $user->lastname }}">
                </div>

                <div class="form-group">
                    <label>Prenume</label>
                    <input name="firstname" class="form-control" type="text" placeholder="Prenume"
                           value="{{ old('firstname') ?? $user->firstname }}">
                </div>

                <div class="form-group">
                    <label>Email</label>
                    <input name="email" class="form-control" type="text" placeholder="Email"
                           value="{{ old('email') ?? $user->email }}">
                </div>

                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label>Specialitate</label>
                            <select name="specialty_id" class="selectpicker">
                                @foreach($specialties as $specialty)
                                    <option value="{{ $specialty->id }}" {{ $user->settingsMedic->specialty->id === $specialty->id ? 'selected' : '' }}>{{ $specialty->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label>Grad</label>
                            <select name="level_id" class="selectpicker">
                                @foreach($levels as $level)
                                    <option value="{{ $level->id }}" {{ $user->settingsMedic->level->id === $level->id ? 'selected' : '' }}>{{ $level->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                @include('authenticated.medic.components.account-textarea', ['title' => 'Specializare',                 'key' => 'specialisation',               'user' => $user])
                @include('authenticated.medic.components.account-textarea', ['title' => 'Competențe',                   'key' => 'skills',                       'user' => $user])
                @include('authenticated.medic.components.account-textarea', ['title' => 'Domenii de activitate',        'key' => 'areas_of_activity',            'user' => $user])
                @include('authenticated.medic.components.account-textarea', ['title' => 'Educație',                     'key' => 'education',                    'user' => $user])
                @include('authenticated.medic.components.account-textarea', ['title' => 'Cursuri postuniversitare',     'key' => 'postgraduate_courses',         'user' => $user])
                @include('authenticated.medic.components.account-textarea', ['title' => 'Traininguri',                  'key' => 'trainings',                    'user' => $user])
                @include('authenticated.medic.components.account-textarea', ['title' => 'Certificări internaționale',   'key' => 'international_certifications', 'user' => $user])
                @include('authenticated.medic.components.account-textarea', ['title' => 'Publicații',                   'key' => 'publications',                 'user' => $user])
                @include('authenticated.medic.components.account-textarea', ['title' => 'Membru în',                    'key' => 'member',                       'user' => $user])
                @include('authenticated.medic.components.account-textarea', ['title' => 'Alte realizări',               'key' => 'other_realizations',           'user' => $user])


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
                            <input name="old_password" class="form-control" type="password" placeholder="Parolă veche">
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
                            <input name="password_confirmation" class="form-control" type="password"
                                   placeholder="Confirmare parola noua">
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-outline-dark">Salvați parola</button>
            </form>
        </div>
    </div>

@endsection
