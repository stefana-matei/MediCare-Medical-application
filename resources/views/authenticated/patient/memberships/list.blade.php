@extends('authenticated.layouts.app')

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        List Memberships <br>
        <x-link href="{{ route('memberships.createView') }}">
            Create
        </x-link>
    </h2>
@endsection

@section('main')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                @foreach($memberships as $membership)
                    <div class="p-6 bg-white border-b border-gray-200">
                        <p><strong>Medic:</strong> {{ $membership->medic->name }} #{{$membership->medic_id}}</p>
                        <p><strong>Patient:</strong> {{ $membership->patient->name }} #{{$membership->patient_id}}</p>

                        <x-link href="{{ route('memberships.get', ['id' => $membership->id]) }}">
                            Get
                        </x-link>

                        <x-link href="{{ route('memberships.updateView', ['id' => $membership->id]) }}">
                            Update
                        </x-link>

                        <form class="inline-block" method="POST"
                              action="{{ route('memberships.delete', ['id' => $membership->id]) }}">
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
