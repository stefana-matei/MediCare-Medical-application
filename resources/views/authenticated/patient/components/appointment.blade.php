@php($future = $future ?? false)
@php($width = $width ?? 4)


<div class="col-12 col-md-{{ $width }}">
    <div class="card text-center mb-5 bg-light">

        @if($future)
            <button type="button"
                    class="btn-close float-end p-2"
                    aria-label="Close"
                    data-bs-toggle="modal"
                    data-bs-target="#appointment-delete-modal-{{ $appointment->id }}">
                <i class="icofont-close-line"></i>
            </button>

            <div class="modal fade"
                 id="appointment-delete-modal-{{ $appointment->id }}"
                 tabindex="-1"
                 role="dialog"
                 aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                            <i class="icofont-close-line"></i>
                        </button>

                        <div class="modal-header justify-content-center py-5">
                            <h5>Confirmați anularea programării?</h5>
                        </div>

                        <div class="modal-footer">
                            <div class="actions w-100 justify-content-between">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Nu</button>

                                <form class="inline-block" method="POST"
                                      action="{{ route('appointments.delete', ['id' => $appointment->id]) }}">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn btn-danger"
                                            onclick="$(this).prop('disabled', true); $(this).parent().submit()">
                                        Da, anulează
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        <div class="card-header pt-4 fs-4">
            <strong>{{ $appointment->date->format('d M Y') }}</strong><br>
            <strong>{{ $appointment->confirmed ? $appointment->date->format('H:i') : ''}}</strong>
        </div>

        <div class="card-body">
            <hr class="mt-0 mb-4">
            <img src="{{ $appointment->membership->medic->avatar }}"
                 alt="{{ $appointment->membership->medic->name }}" width="70" height="70"
                 class="rounded-500 mb-4">
            <div class="d-flex justify-content-center align-items-center">
                <div class="fs-20" style="color: #1f4197; font-weight: bold">
                    {{ $appointment->membership->medic->medicName }}
                </div>
            </div>

            <div class="d-flex justify-content-center align-items-center">
                <div class="text-muted">
                    <p class="fs-20">{{ $appointment->membership->medic->settingsMedic->specialty->name }}</p>

                    @if($future || $appointment->confirmed === 0)
                        <p style="color: {{ $appointment->status['color'] }}">
                            <strong>{{ $appointment->status['text'] }}</strong>
                        </p>
                    @else
                        <p style="color: {{ $appointment->honored ? 'green' : 'red' }}">
                            <strong>{{ $appointment->honored ? 'Onorată' : 'Neonorată' }}</strong>
                        </p>

                        @if($appointment->honored)
                            @if($appointment->visit?->record)
                                <div class="d-grid gap-2 col-6">
                                    <a href="{{ route('appointments.get', ['id' => $appointment->id]) }}"
                                       type="button" class="btn btn-primary btn-mini">
                                        Vezi raportul medical
                                    </a>
                                </div>
                            @else
                                <div class="d-grid gap-2 col-6">
                                    <a href="{{ route('appointments.get', ['id' => $appointment->id]) }}"
                                       type="button" class="btn btn-secondary btn-mini disabled">
                                        Vezi raportul medical
                                    </a>
                                </div>
                            @endif
                        @endif

                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
