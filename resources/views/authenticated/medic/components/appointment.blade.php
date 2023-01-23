@php($future = $future ?? false)
@php($width = $width ?? 4)
@php($acceptActions = $acceptActions ?? false)
@php($updateActions = $updateActions ?? false)

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
                            <h5>Această acțiune este ireversibilă! <br>Confirmați ștergerea programării?</h5>
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
                                        Da, sterge
                                    </button>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        @endif


        <div class="card-header pt-4 fs-4">
            <strong>{{ $appointment->id }}</strong><br>
            <strong>{{ $appointment->date->format('d M Y') }}</strong><br>
            <strong>{{ $appointment->confirmed ? $appointment->date->format('H:i') : ''}}</strong>
        </div>

        <div class="card-body">
            <hr class="mt-0 mb-4">
            <img src="{{ $appointment->membership->patient->avatar }}"
                 alt="{{ $appointment->membership->patient->name }}" width="70" height="70"
                 class="rounded-500 mb-4">
            <div class="d-flex justify-content-center align-items-center">
                <div class="fs-20" style="color: #1f4197; font-weight: bold">
                    {{ $appointment->membership->patient->name }}
                </div>
            </div>

            <div class="d-flex justify-content-center align-items-center">
                <div class="text-muted">
                    @if($appointment->trashed())
                        <p style="color: red"><strong>Anulată</strong></p>
                    @else
                        @if($future || $appointment->confirmed === 0)
                            <p style="color: {{ $appointment->status['color'] }}">
                                <strong>{{ $appointment->status['text'] }}</strong>
                            </p>
                        @else
                            <p style="color: {{ $appointment->honored ? 'green' : 'red' }}">
                                <strong>{{ $appointment->honored ? 'Onorată' : 'Neonorată' }}</strong>
                            </p>
                        @endif
                    @endif
                </div>
            </div>

            @if($acceptActions)
                <div class="d-flex justify-content-center align-items-center mt-4">
                    <button class="btn btn-primary btn-mini me-4"
                            data-bs-toggle="modal" data-bs-target="#appointment-accept-modal-{{ $appointment->id }}">
                        Acceptare
                    </button>
                    <button class="btn btn-danger btn-mini"
                            data-bs-toggle="modal" data-bs-target="#appointment-refuse-modal-{{ $appointment->id }}">
                        Refuzare
                    </button>
                </div>

                <div class="modal fade"
                     id="appointment-refuse-modal-{{ $appointment->id }}"
                     tabindex="-1"
                     role="dialog"
                     aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                <i class="icofont-close-line"></i>
                            </button>

                            <div class="modal-header justify-content-center py-5">
                                <h5>Confirmați refuzarea programării?</h5>
                            </div>

                            <div class="modal-footer">
                                <div class="actions w-100 justify-content-between">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Nu</button>

                                    <form class="inline-block" method="POST"
                                          action="{{ route('medic.appointments.refuse', ['id' => $appointment->id]) }}">
                                        @csrf
                                        @method('PUT')

                                        <button type="submit" class="btn btn-danger"
                                                onclick="$(this).prop('disabled', true); $(this).parent().submit()">
                                            Da, refuz
                                        </button>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade"
                     id="appointment-accept-modal-{{ $appointment->id }}"
                     tabindex="-1"
                     role="dialog"
                     aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                <i class="icofont-close-line"></i>
                            </button>

                            <form class="inline-block" method="POST"
                                  action="{{ route('medic.appointments.accept', ['id' => $appointment->id]) }}">
                                @csrf
                                @method('PUT')
                                <div class="modal-header d-block py-5 text-center">
                                    <h5 class="mb-4">Inainte de a confirma alegeti si intervalul orar</h5>

                                    <select name="timeslot" class="form-control w-auto d-inline-block">
                                        @foreach($timeslots as $timeslot)
                                            <option value="{{ $timeslot['start'] }}" {{ $loop->first ? 'selected' : '' }}>{{ $timeslot['start'] . ' - ' . $timeslot['end']}}</option>
                                        @endforeach
                                    </select>

                                </div>

                                <div class="modal-footer">
                                    <div class="actions w-100 justify-content-between">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Inapoi</button>

                                        <button type="submit" class="btn btn-primary"
                                                onclick="$(this).prop('disabled', true); $(this).closest('form').submit()">
                                            Accepta programarea
                                        </button>
                                    </div>
                                </div>

                            </form>

                        </div>
                    </div>
                </div>
            @endif

            @if($updateActions)
                <div class="d-flex justify-content-center align-items-center mt-4">
                    <a href="{{ route('medic.appointments.updateView', ['id' => $appointment->id]) }}" class="btn btn-primary btn-mini">Actualizeaza</a>
                </div>
            @endif
        </div>
    </div>
</div>
