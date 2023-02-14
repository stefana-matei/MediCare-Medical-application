<div>
    <div class="modal-body pt-5">
        <div class="row">
            @include('authenticated.patient.components.medic', ['width' => 6, 'user' => $medic, 'showProfile' => false])

            <div class="col-md-6">
                <label>Selectați data dorită</label>
                <livewire:calendar-select/>
            </div>
        </div>
    </div>
    <div class="modal-footer pt-2">

        <div class="d-block w-100 text-center pb-5">
            <h6>Confirmă programarea</h6>
            <h4 class="my-0">Medic: {{ $medic->medicName }}</h4>
            <h4 class="my-0">Data: {{ $date->format('Y-m-d') }}</h4>
        </div>

        <div class="actions w-100 justify-content-around">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Anulează</button>

            <form class="inline-block" method="POST" action="{{ route('appointments.create') }}">
                @csrf
                <input type="hidden" name="date" value="{{ $date->format('Y-m-d') }}">
                <input type="hidden" name="medic_id" value="{{ $medic?->id }}">
                <button type="submit" class="btn btn-success">
                    Confirmă
                </button>
            </form>
        </div>
    </div>
</div>
