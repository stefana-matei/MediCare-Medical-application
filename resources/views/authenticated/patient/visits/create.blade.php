@extends('authenticated.layouts.app')

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Create Visit
    </h2>
@endsection

@section('main')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <x-auth-validation-errors class="mb-4" :errors="$errors" />

                <form method="POST" action="{{ route('visits.create') }}">
                    @csrf

                    <label class="block">Membership ID</label>
                    <select name="membership_id">
                        @foreach($memberships as $membership)
                            <option value="{{ $membership->id }}">{{ $membership->medic->name }}</option>
                        @endforeach
                    </select>
                    <br><br>

                    <x-submit>
                        Create
                    </x-submit>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
