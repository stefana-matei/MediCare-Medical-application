@php use App\Services\Calendar; @endphp
<div>
    <div class="row">
        <div class="col-8">
            <div class="form-group">
                <label>Status programare</label>
                <div>
                    <div class="btn-group" role="group">
                        <button class="btn {{ is_null($confirmed) ? 'btn-primary' : 'btn-outline-primary' }}"
                                wire:click="setConfirmed(null)">In asteptare
                        </button>
                        <button class="btn {{ $confirmed === true ? 'btn-primary' : 'btn-outline-primary' }}"
                                wire:click="setConfirmed(true)">Confirmata
                        </button>
                        <button class="btn {{ $confirmed === false ? 'btn-primary' : 'btn-outline-primary' }}"
                                wire:click="setConfirmed(false)">Refuzata
                        </button>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label>Onorata</label>
                <div>
                    <div class="btn-group" role="group">
                        <button class="btn {{ !$confirmed ? 'disabled' : '' }}  {{ $honored === true ? 'btn-primary' : 'btn-outline-primary' }}"
                                wire:click="setHonored(true)">Onorata
                        </button>
                        <button class="btn {{ $honored === false ? 'btn-primary' : 'btn-outline-primary' }}"
                                wire:click="setHonored(false)">Neonorata
                        </button>
                    </div>
                </div>
            </div>


            @if($honored)
                <div class="form-group">
                    <label>Fisa medicala</label>
                    <div>
                        <div class="btn-group" role="group">
                            <button class="btn {{ $hasRecord === true ? 'btn-primary' : 'btn-outline-primary' }}"
                                    wire:click="setHasRecord(true)">Yes
                            </button>
                            <button class="btn {{ $hasRecord === false ? 'btn-primary' : 'btn-outline-primary' }}"
                                    wire:click="setHasRecord(false)">No
                            </button>
                        </div>
                    </div>
                </div>

                @if($hasRecord)

                    @include('authenticated.medic.components.record-textarea', ['title' => 'Istoric medical', 'key' => 'medical_history', 'record' => $appointment?->visit?->record])
                    @include('authenticated.medic.components.record-textarea', ['title' => 'Simptome', 'key' => 'symptoms', 'record' => $appointment?->visit?->record])
                    @include('authenticated.medic.components.record-textarea', ['title' => 'Diagnostic', 'key' => 'diagnosis', 'record' => $appointment?->visit?->record])
                    @include('authenticated.medic.components.record-textarea', ['title' => 'Date clinice', 'key' => 'clinical_data', 'record' => $appointment?->visit?->record])
                    @include('authenticated.medic.components.record-textarea', ['title' => 'Date para-clinice', 'key' => 'para_clinical_data', 'record' => $appointment?->visit?->record])

                    <div class="form-group">
                        <label>Bilet de trimitere</label>
                        <div>
                            <div class="btn-group" role="group">
                                <button
                                    class="btn {{ $record['referral'] === true ? 'btn-primary' : 'btn-outline-primary' }}"
                                    wire:click="setRecordReferral(true)">Yes
                                </button>
                                <button
                                    class="btn {{ $record['referral'] === false ? 'btn-primary' : 'btn-outline-primary' }}"
                                    wire:click="setRecordReferral(false)">No
                                </button>
                            </div>
                        </div>
                    </div>

                    @include('authenticated.medic.components.record-textarea', ['title' => 'Recomandari', 'key' => 'indications', 'record' => $appointment?->visit?->record])

                @endif
            @endif


        </div>
        <div class="col-4">
            <div class="form-group">
                <label>Data programarii</label>
                <livewire:calendar-select/>
            </div>

            <div class="form-group">
                <label>Ora programarii</label>
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


    <button wire:click="submit()" class="btn btn-primary">Trimite actualizarea</button>
</div>
