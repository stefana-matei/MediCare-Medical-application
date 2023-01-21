<div>
    <div class="input-group flex-nowrap">
        <span class="input-group-text" id="addon-wrapping"><span class="sli-magnifier"></span></span>
        <input wire:model="search" type="text" class="form-control"
               placeholder="Cautati dupa CNP, nume, prenume, email">
    </div>


    @if($count !== 1)
        <h5 class="mb-1">{{ $count }} pacienti gasiti</h5>
    @else
        <h5 class="mb-1">{{ $count }} pacient gasit</h5>
    @endif


    <table class="table">
        <thead>
        <tr>
            <th scope="col"></th>
            <th scope="col">Nume</th>
            <th scope="col">Cod numeric personal</th>
            <th class="text-center" scope="col">Membru</th>
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
                    @if( $patient->active_membership )
                        <div class="col-md-12 text-center">
                            <button class="btn btn-success btn-square rounded-pill">
                                <span class="btn-icon icofont-check"></span>
                            </button>
                        </div>
                    @else
                        <div class="col-md-12 text-center">
                            <button wire:click="addPatient({{$patient->id}})" class="btn btn-primary btn-square rounded-pill">
                                <span class="btn-icon icofont-plus"></span>
                            </button>
                        </div>
                    @endif

                </td>
            </tr>
        @empty
            <td colspan="4">
                <span class="text-center d-block py-4 fw-bold">
                    <span class="icon sli-book-open text-muted fs-48 mb-2"></span><br>

                    @if(empty($search))
                        Introduceti criteriul de cautare dorit
                    @else
                        Nu au fost gasiti pacienti dupa criteriul de cautare<br>
                        Ati cautat: {{ $search }}
                    @endif



                </span>
            </td>
        @endforelse
        </tbody>
    </table>


</div>
