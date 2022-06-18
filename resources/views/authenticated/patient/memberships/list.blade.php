@extends('authenticated.layouts.app')

@section('header')
    <h2>Medicii mei</h2>
@endsection

@section('main')

    <div class="page-content">
        <div class="row">
            @foreach($memberships as $membership)
                @include('authenticated.components.medic', ['user' => $membership->medic])
            @endforeach
        </div>
    </div>

@endsection
