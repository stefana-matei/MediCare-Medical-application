<div>
    <form id="appointment-create-form" class="mt-5" method="POST" action="{{ route('appointments.create') }}">
        @csrf

        <div class="row">
            <div class="col-sm-8">
                <div wire:ignore class="form-group">
                    <label>Specialitate</label>
                    <select class="selectpicker" data-live-search="true" onchange="Livewire.emit('specialtySelectedEvent', this.value)">
                        <option value="0"></option>
                        @foreach($specialties as $specialty)
                            <option value="{{ $specialty->id }}">{{ $specialty->name }}</option>
                        @endforeach
                    </select>
                </div>

                @if(empty($medics))
                    <div class="empty-alert alert alert-secondary">
                        Pentru o noua programare, te rugam sa alegi data programarii si specialitatea medicului.
                    </div>
                @else
                    <div class="row">
                        @forelse($medics as $medic)

                            @include('authenticated.components.medic-appointment', ['width' => 4, 'user' => $medic])

                        @empty
                            <p>Nu sunt medici cu aceasta specialitate.</p>
                        @endforelse
                    </div>
                @endif
            </div>
            <div class="col-sm-4">
                <label>Incepand cu data</label>
                <livewire:calendar-select />
            </div>
        </div>



    </form>
</div>
