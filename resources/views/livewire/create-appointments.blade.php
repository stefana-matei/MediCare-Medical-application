<div>
    <form id="appointment-create-form" class="mt-5" method="POST" action="{{ route('appointments.create') }}">
        @csrf

        <div class="row">
            <div class="col-sm-6">
                <div wire:ignore class="form-group">
                    <label>Alege tipul investigatiei</label>
                    <select class="selectpicker" data-live-search="true" onchange="Livewire.emit('serviceSelectedEvent', this.value)">
                        <option value="0"></option>
                        @foreach($services as $service)
                            <option value="{{ $service->id }}">{{ $service->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label>Dupa data</label>
                    <input name="date" class="form-control" type="date" placeholder="Data programarii"
                           value="{{ now()->addDay()->format('Y-m-d') }}">
                </div>
            </div>
        </div>

        @if(empty($medics))
            <div class="empty-alert alert alert-secondary">
                Alege un serviciu de mai sus
            </div>
        @else
            <div class="row">
                @forelse($medics as $medic)

                    @include('authenticated.components.medic-appointment', ['width' => 3, 'user' => $medic])

                @empty
                    <p>no medics to show</p>
                @endforelse
            </div>
        @endif

    </form>
</div>
