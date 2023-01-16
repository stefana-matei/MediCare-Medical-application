<div>
    <form id="appointment-create-form" class="mt-5" method="POST" action="{{ route('appointments.create') }}">
        @csrf
        <div class="row">
            <div class="col-sm-8">
                <div wire:ignore class="form-group">
                    <label>Specialitate</label>
                    <select class="selectpicker" data-live-search="true"
                            onchange="Livewire.emit('specialtySelectedEvent', this.value)">
                        <option value="0"></option>
                        @foreach($specialties as $specialty)
                            <option value="{{ $specialty->id }}">{{ $specialty->name }}</option>
                        @endforeach
                    </select>
                </div>

                @if(empty($medics))
                    <div class="empty-alert alert alert-secondary">
                        Pentru o nouă programare, va rugăm să alegeți dată programării și specialitatea medicului.
                    </div>
                @else
                    <div class="row">
                        @forelse($medics as $medic)
                            @include('authenticated.components.medic-appointment', ['user' => $medic])
                        @empty
                            <p>Nu sunt medici cu această specialitate.</p>
                        @endforelse
                    </div>
                @endif
            </div>
            <div class="col-sm-4">
                <label>Selectați data dorită</label>
                <livewire:calendar-select/>
            </div>
        </div>
    </form>


    <!-- Modal -->
    <div class="modal fade" id="confirmAppointment" tabindex="-1" aria-labelledby="confirmAppointment" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-body pt-5">
                    @if($selectedMedic)
                        @include('authenticated.components.medic-confirm-appointment', ['user' => $selectedMedic, 'date' => $selectedDate])
                    @endif
                </div>
                <div class="modal-footer">
                    <div class="actions w-100 justify-content-between">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Anulează</button>

                        <form class="inline-block" method="POST" action="{{ route('appointments.create') }}">
                            @csrf
                            <input type="hidden" name="date" value="{{ $selectedDate->format('Y-m-d') }}">
                            <input type="hidden" name="medic_id" value="{{ $selectedMedic?->id }}">
                            <button type="submit" class="btn btn-success">
                                Confirmă
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
