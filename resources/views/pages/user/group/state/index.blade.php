@php

    $root = $group->parent->parent;
    $workspace = $group->parent;
    $topic = $group;

@endphp
@extends('layouts.user-header-and-footer')
{{-- @section('html_title', $topic->name.' | '.$workspace->name.' | '.$session->short_description.' | '.$state->name.' | '.$root->name) --}}
@push('body')
    <x-container>

        {{-- Navigation --}}
        <ul class="mb-5">
            <li><a href="{{ route('group.show', $root) }}" class="underline">{{ $root->name }}</a></li>
            <li><a href="{{ route('group.show', $workspace) }}" class="underline">{{ $workspace->name }}</a></li>
            <li><a href="{{ route('group.show', $topic) }}" class="underline">{{ $topic->name }}</a></li>
        </ul>

        <h1 class="mb-4 font-bold text-lg">{{ $topic->name }}</h1>

        {{-- State --}}
        <h2 class="mb-0.5">Pick a state:</h2>
        @foreach (array_diff(array_keys(config('enum.legiscan_states')), ['US', 'DC']) as $state_abbr)

            <a href="{{ route('group.state.show', [$group, $state_abbr]) }}"
                class="w-48 inline-block underline"
                >{{ config('enum.legiscan_states')[$state_abbr] }}</a>

        @endforeach

        <div class="mt-5">

            <a href="{{ route('group.state.show', [$group, 'DC']) }}"
                class="w-48 inline-block underline"
                >{{ config('enum.legiscan_states')['DC'] }}</a>

            <a href="{{ route('group.state.show', [$group, 'US']) }}"
                class="w-48 inline-block underline"
                >{{ config('enum.legiscan_states')['US'] }}</a>

        </div>

    </x-container>
@endpush
