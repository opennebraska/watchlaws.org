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
            <li>{{ $topic->name }}</li>
        </ul>

        <h1 class="mb-4 font-bold text-lg">{{ $topic->name }}</h1>

        {{-- State --}}
        <h2 class="mb-1 font-semibold">Legislature</h2>

        @if ($topic->default_state)

            <div class="mb-1">
                <a href="{{ route('group.state.show', [$topic, $topic->default_state->abbreviation]) }}" class="underline"
                    >{{ $topic->default_state->name }}</a>
                    (<a href="{{ route('group.state.index', $topic) }}" class="underline">change</a>)
            </div>
            @if ($topic->default_state->abbreviation != 'US')
                <div>
                    <a href="{{ route('group.state.show', [$topic, 'US']) }}" class="underline">{{ config('enum.legiscan_states.US') }}</a>
                </div>
            @endif

        @else

            <div class="mb-1">
                <a href="{{ route('group.state.index', $topic) }}" class="underline">Pick a state</a>
            </div>
            <div>
                <a href="{{ route('group.state.show', [$topic, 'US']) }}" class="underline">{{ config('enum.legiscan_states.US') }}</a>
            </div>

        @endif


    </x-container>
@endpush
