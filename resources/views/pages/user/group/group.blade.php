@extends('layouts.user-header-and-footer')
{{-- @section('html_title', '') --}}
@push('body')
    <x-container>

        {{-- Navigation --}}
        <ul class="mb-5">
            <li>{{ $group->name }}</li>
        </ul>

        {{-- State --}}
        <h2 class="mb-1 font-semibold text-lg">States</h2>
        @foreach (config('enum.legiscan_states') as $state => $label)

            <a href="{{ route('group.state.show', [$group, $state]) }}"
                class="w-48 inline-block underline"
                >{{ $label }}</a>

        @endforeach

    </x-container>
@endpush
