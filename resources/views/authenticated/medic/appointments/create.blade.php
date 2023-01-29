@extends('authenticated.medic.layouts.app')

@section('head')
    @livewireStyles
@endsection

@section('scripts')
    @livewireScripts

    <script>
        function closeModal() {
            $('#select-patient').modal('hide');
        }
    </script>
@endsection

@section('header')
    <h2>Noua programare</h2>
@endsection

@section('main')
    <livewire:create-appointment/>
@endsection

@section('modals')
    <div class="modal fade" id="select-patient" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Selectare pacient</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <livewire:medic-create-appointment-patient-selector/>
                </div>
            </div>
        </div>
    </div>
@endsection





