@extends('authenticated.layouts.app')

@section('header')
    <h2>Servicii medicale</h2>
@endsection

@section('main')
    <div class="card">
        <div class="card-body">
            <table
                class="table data-table"
                data-info="false"
            >
                <thead>
                <tr>
                    <th>Nume serviciu</th>
                    <th>Pret</th>
                    <th>Medici</th>
                    <th>Programare</th>
                </tr>
                </thead>
                <tbody>
                @foreach($services as $service)
                    <tr>
                        <td>{{ $service->name }}</td>
                        <td>{{ $service->price }}</td>
                        <td>
                            <div class="team d-flex align-items-center">
                                <strong class="me-3">{{ $service->users->count() }}</strong>

                                <div class="avatar-list">
                                    @foreach($service->users->take(5) as $user)
                                        <a class="avatar" href="{{ route('medics.get', ['id' => $user->id]) }}" title="{{ $user->medicName }}">
                                            <img src="{{ $user->avatar }}" width="35" height="35" alt="" class=" rounded-500">
                                        </a>

                                    @endforeach
                                </div>

                            </div>


                        </td>
                        <td><a class="btn btn-success btn-sm" href="#">Programeaza-te</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
