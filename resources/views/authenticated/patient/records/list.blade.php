@extends('authenticated.layouts.app')

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        List Visits <br>
        <x-link href="{{ route('visits.createView') }}">
            Create
        </x-link>
    </h2>
@endsection

@section('main')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                @foreach($visits as $visit)
                    <div class="p-6 bg-white border-b border-gray-200">
                        <p><strong>Onorata: </strong> {{ $visit->honored ? 'Da' : 'Nu' }}</p>
                        <p><strong>Data: </strong> {{ $visit->date }}</p>
                        <p><strong>Medic ID: </strong> {{ $visit->membership->medic_id }}</p>
                        <p><strong>Medic name: </strong> {{ $visit->membership->medic->name }}</p>

                        <x-link href="{{ route('visits.get', ['id' => $visit->id]) }}">
                            Get
                        </x-link>

                        <x-link href="{{ route('visits.updateView', ['id' => $visit->id]) }}">
                            Update
                        </x-link>

                        <form class="inline-block" method="POST"
                              action="{{ route('visits.delete', ['id' => $visit->id]) }}">
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
