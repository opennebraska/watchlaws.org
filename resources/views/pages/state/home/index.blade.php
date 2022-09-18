@extends('layouts.header-and-footer')
@section('html_title', $state->state_name)
@section('navbar_title')
    <span class="text-gray-400 mr-1">How laws are made in</span> {{ $state->state_name }}
@endsection
@push('body')
    <x-container>

        <h1 class="font-bold text-xl">

            <a href="/" class="text-gray-400 hover:underline">States</a>
            <span class="text-gray-300">/</span>
            {{ $state->state_name }}
        </h1>

        @livewire('bill-table', ['state_id' => $state->state_id])

    </x-container>
@endpush
