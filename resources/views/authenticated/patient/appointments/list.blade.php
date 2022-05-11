@extends('authenticated.layouts.app')

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Programarile mele <br>
        <x-link href="{{ route('appointments.createView') }}">
            Adaugare Programare online
        </x-link>
    </h2>
@endsection

@section('main')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                @foreach($appointments as $appointment)
                    <div class="p-6 bg-white border-b border-gray-200">
                        <p><strong>Data: </strong> {{ $appointment->date }}</p>
                        <p><strong>Doctor: </strong> {{ $appointment->membership->medic->name }}</p>
                        <p><strong>Specialization: </strong> {{ $appointment->specialization }}</p>
                        <p style="color: {{ $appointment->honored ? 'green' : 'red' }}"><strong>{{ $appointment->honored ? 'Onorata' : 'Neonorata' }}</strong> </p>


                        <x-link href="{{ route('appointments.get', ['id' => $appointment->id]) }}">
                            Vezi consultatia
                        </x-link>

{{--                        <x-link href="{{ route('appointments.updateView', ['id' => $appointment->id]) }}">--}}
{{--                            Update--}}
{{--                        </x-link>--}}

                        <form class="inline-block" method="POST"
                              action="{{ route('appointments.delete', ['id' => $appointment->id]) }}">
                            @csrf
                            @method('DELETE')

                            <x-submit>
                                Delete
                            </x-submit>
                        </form>

                    </div>
                @endforeach



            </div>
        </div>
    </div>
@endsection
