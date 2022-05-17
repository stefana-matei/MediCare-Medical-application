@extends('authenticated.layouts.app')

@section('header')
    <h1 class="page-title">Prima pagina</h1>
@endsection

@section('main')
    <div class="row">

{{--        @forelse($medics as $medic)--}}
{{--            @include('authenticated.components.doctor', ['user' => $medic])--}}
{{--        @empty--}}
{{--            <p>Nu sunt medici</p>--}}
{{--        @endforelse--}}

{{--        @each('authenticated.components.doctor', $medics, 'medic')--}}


        @include('authenticated.components.doctor', ['user' => 'Georgeta'])
        @include('authenticated.components.doctor', ['user' => 'Maria'])
        @include('authenticated.components.doctor', ['user' => 'Capsunica'])
        @include('authenticated.components.doctor', ['user' => 'Ionica'])
        @include('authenticated.components.doctor', ['user' => 'Prichindel'])
    </div>
@endsection
