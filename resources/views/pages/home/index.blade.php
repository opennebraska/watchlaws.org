@extends('layouts.header-and-footer')
@push('body')
    <x-container>

        <div class="font-bold mb-3">
            Pick a state:
        </div>
        <div class="flex flex-wrap">
            @foreach ($states as $state)

                <div class="w-48 leading-7">
                    <a class="underline" href="{{ route('state.home.index', compact('state')) }}">{{ $state->state_name }}</a>
                    <span class="text-gray-500">({{ $state->bills->count() }})</span>
                </div>


            @endforeach
        </div>

        <div class="flex flex-wrap mt-6">

            <div class="w-48 leading-7">
                <a class="underline" href="{{ route('state.home.index', ['state' => $us]) }}">{{ $us->state_name }}</a>
                <span class="text-gray-500">({{ $us->bills->count() }})</span>
            </div>
            <div class="w-48 leading-7">
                <a class="underline" href="{{ route('state.home.index', ['state' => $dc]) }}">{{ $dc->state_name }}</a>
                <span class="text-gray-500">({{ $dc->bills->count() }})</span>
            </div>

        </div>

    </x-container>
@endpush
