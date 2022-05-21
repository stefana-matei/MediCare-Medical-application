@extends('authenticated.layouts.app')

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Consultatiile mele
    </h2>

    <a href="{{ route('visits.createView') }}" class="btn btn-primary align-self-center " role="button">
        Adauga consultatie
    </a>
@endsection

@section('main')
    <div class="page-content mt-5">
        <div class="row">
            @foreach($visits as $visit)
                @include('authenticated.components.visit', compact('visit'))
            @endforeach

        </div>
    </div>
@endsection



{{--<div class="col-12 col-md-4">--}}
{{--    <div class="card text-center mb-5 bg-light">--}}
{{--        <div class="card-header" style="color: #1f4197">--}}
{{--            <strong>{{ $visit->membership->medic->name }}</strong>--}}
{{--        </div>--}}
{{--        <div class="card-body">--}}
{{--            <div class="d-flex justify-content-center align-items-center">--}}
{{--                <div class="fs-20">--}}
{{--                    {{ $visit->membership->medic->settingsMedic?->specialty?->name }}--}}
{{--                </div>--}}
{{--            </div>--}}

{{--            <hr class="mt-4 mb-4">--}}

{{--            <ul class="list-unstyled text-start">--}}
{{--                <div class="text-muted">--}}
{{--                    <div class="fs-20">Data procesarii</div>--}}
{{--                </div>--}}
{{--                <li class="d-flex align-items-center pt-2 pb-2">--}}
{{--                    <span class="ms-1">{{ $visit->date }}</span>--}}
{{--                </li>--}}
{{--            </ul>--}}


{{--            @if($visit->record)--}}
{{--                <a href="{{ route('visits.record.get', ['visit_id' => $visit->id]) }}"--}}
{{--                   class="btn btn-primary w-90 mb-3" role="button">--}}
{{--                    Vezi raportul consultatiei--}}
{{--                </a>--}}
{{--            @endif--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}





