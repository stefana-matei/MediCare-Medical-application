@php use App\Services\Calendar; @endphp
<div>
    <div class="row">
        <div class="col-8">

            @if(is_null($patient))
                <livewire:medic-create-appointment-patient-selector/>
            @else
                <div class="d-flex">
                    <h4>Pacient - {{ $patient->name }}</h4>

                    <button type="button" class="btn btn-outline-primary align-self-center ps-3 ms-auto"
                            data-bs-toggle="modal" data-bs-target="#select-patient">
                        <span class="btn-icon icofont-plus fs-6 me-3"></span>
                        Schimba pacient
                    </button>
                </div>



                <div class="form-group">
                    <label>Status programare</label>
                    <div>
                        <div class="btn-group" role="group">
                            <button class="btn {{ is_null($confirmed) ? 'btn-primary' : 'btn-outline-primary' }}"
                                    wire:click="setConfirmed(null)">În așteptare
                            </button>
                            <button class="btn {{ $confirmed === true ? 'btn-primary' : 'btn-outline-primary' }}"
                                    wire:click="setConfirmed(true)">Confirmată
                            </button>
                            <button class="btn {{ $confirmed === false ? 'btn-primary' : 'btn-outline-primary' }}"
                                    wire:click="setConfirmed(false)">Refuzată
                            </button>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label>Onorată</label>
                    <div>
                        <div class="btn-group" role="group">
                            <button
                                class="btn {{ !$confirmed ? 'disabled' : '' }}  {{ $honored === true ? 'btn-primary' : 'btn-outline-primary' }}"
                                wire:click="setHonored(true)">Onorată
                            </button>
                            <button class="btn {{ $honored === false ? 'btn-primary' : 'btn-outline-primary' }}"
                                    wire:click="setHonored(false)">Neonorată
                            </button>
                        </div>
                    </div>
                </div>

                <button wire:click="submit()" class="btn btn-success mt-5">Creaza programare</button>

            @endif
        </div>
        <div class="col-4">
            <div class="form-group">
                <label>Data programării</label>
                <livewire:calendar-select/>
            </div>

            <div class="form-group">
                <label>Ora programării</label>
                <div>
                    <select wire:model="time" wire:ignore class="form-control w-auto d-inline-block">
                        @foreach(Calendar::getTimeslots() as $timeslot)
                            <option
                                value="{{ $timeslot['start'] }}" {{ $timeslot['start'] === $time ? 'selected' : '' }}>{{ $timeslot['start'] . ' - ' . $timeslot['end']}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
    </div>

</div>
