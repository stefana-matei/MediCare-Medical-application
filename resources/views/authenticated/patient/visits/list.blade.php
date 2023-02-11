@extends('authenticated.patient.layouts.app')

@section('header')
    <h2>Consultațiile mele</h2>
@endsection

@section('main')
    <div class="d-flex align-items-center">
        <form id="visits-search"
              class="{{ request()->has('medic') ? '' : 'customizable-placeholder' }} search-height w-50">
            <div class="form-group mb-0">
                <select name="medic" class="selectpicker" data-live-search="true"
                        onchange="$('#visits-search').submit()">
                    <option></option>

                    @foreach($memberships as $membership)
                        <option value="{{ $membership->id }}"
                                {{ $membership->id == request('medic') ? 'selected' : '' }}
                                data-subtext="{{ $membership->medic->settingsMedic->specialty->name }}">{{ $membership->medic->name }}</option>
                    @endforeach

                </select>
            </div>
        </form>

        @if(request()->medic)
            <a class="btn btn-light btn-reset ms-3 shadow-none ps-3" href="{{ route('visits.list') }}">
                <span class="btn-icon icofont-refresh fs-6 me-2"></span>
                Resetează
            </a>
        @endif
    </div>

    <div class="page-content mt-5">
        <div class="row">
            @forelse($visits as $visit)
                @include('authenticated.patient.components.visit', ['visit' => $visit])
            @empty
                <div class="col">
                    <div class="alert alert-secondary with-before-icon" role="alert">
                        <div class="alert-icon"><i class="icofont-ui-copy"></i></div>
                        @if(is_null($medic))
                            <div class="alert-content">Nu sunt informații despre istoricul consultațiilor
                                dumneavoastră!
                            </div>
                        @else
                            <div class="alert-content">Nu sunt informații despre istoricul consultațiilor
                                la {{ $medic->medicName }}!
                            </div>
                        @endif
                    </div>
                </div>
            @endforelse
        </div>
    </div>
@endsection

