@extends('authenticated.layouts.old')

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Create Membership
    </h2>
@endsection

@section('main')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <x-auth-validation-errors class="mb-4" :errors="$errors" />

                <form method="POST" action="{{ route('memberships.create') }}">
                    @csrf

                    <label class="block">E-mail</label>
                    <input type="email" name="email" autocomplete="none">
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
