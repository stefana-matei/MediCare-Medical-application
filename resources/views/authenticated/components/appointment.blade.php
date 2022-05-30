@php($future = $future ?? false)

<div class="col-12 col-md-4">
    <div class="card text-center mb-5 bg-light">

        @if($future)
        <button type="button" class="btn-close float-end p-2" aria-label="Close">
            <i class="icofont-close-line"></i>
        </button>
        @endif

        <div class="card-header pt-4 fs-4">
            <strong>{{ $appointment->date->format('d M Y H:i') }}</strong>
        </div>

        <div class="card-body">
            <hr class="mt-0 mb-4">
            <img src="{{ $appointment->membership->medic->avatar }}"
                 alt="{{ $appointment->membership->medic->name }}" width="70" height="70"
                 class="rounded-500 mb-4">
            <div class="d-flex justify-content-center align-items-center">
                <div class="fs-20" style="color: #1f4197; font-weight: bold">
                    {{ $appointment->membership->medic->name }}
                </div>
            </div>

            <div class="d-flex justify-content-center align-items-center">
                <div class="text-muted">
                    <p class="fs-20">{{ $appointment->membership->medic->settingsMedic->specialty->name }}</p>

                    @if($future)
                        <p style="color: {{ $appointment->confirmed ? 'green' : 'red' }}">
                            <strong>{{ $appointment->confirmed ? 'Confirmata' : 'Refuzata' }}</strong>
                        </p>
                    @else
                        <p style="color: {{ $appointment->honored ? 'green' : 'red' }}">
                            <strong>{{ $appointment->honored ? 'Onorata' : 'Neonorata' }}</strong>
                        </p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
