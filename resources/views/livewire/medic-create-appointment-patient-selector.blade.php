<div>
    <div class="input-group flex-nowrap">
        <span class="input-group-text" id="addon-wrapping"><span class="sli-magnifier"></span></span>
        <input wire:model="search" type="text" class="form-control"
               placeholder="Căutați după CNP, nume, prenume, email">
    </div>


    @if($count !== 1)
        <h5 class="mb-1">{{ $count }} pacienți găsiți</h5>
    @else
        <h5 class="mb-1">{{ $count }} pacient găsit</h5>
    @endif


    <table class="table">
        <thead>
        <tr>
            <th scope="col"></th>
            <th scope="col">Nume</th>
            <th scope="col">Cod numeric personal</th>
            <th class="text-center" scope="col">Selectare</th>
        </tr>
        </thead>
        <tbody>
        @forelse($patients as $patient)
            <tr>
                <td>
                    <img src="{{ $patient->avatar }}" alt="" width="35" height="35" class="rounded-500">
                </td>
                <td>
                    <strong class="text-nowrap">{{ $patient->name }}</strong><br>
                    <span class="text-muted">{{ $patient->email }}</span>
                </td>
                <td>
                    <span>{{ $patient->settingsPatient->pin }}</span>
                </td>
                <td>
                    <div class="col-md-12 text-center">
                        <button wire:click="selectPatient({{$patient->id}})" onclick="closeModal()" class="btn btn-primary btn-square rounded-pill">
                            <span class="btn-icon icofont-plus"></span>
                        </button>
                    </div>

                </td>
            </tr>
        @empty
            <td colspan="4">
                <span class="text-center d-block py-4 fw-bold">
                    <span class="icon sli-book-open text-muted fs-48 mb-2"></span><br>

                    @if(empty($search))
                        Introduceți criteriul de căutare dorit
                    @else
                        Nu au fost găsiți pacienți după criteriul de căutare<br>
                        Ați căutat: {{ $search }}
                    @endif

                </span>
            </td>
        @endforelse
        </tbody>
    </table>


</div>
