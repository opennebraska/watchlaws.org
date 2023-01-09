@php

    $root = $group->parent->parent;
    $workspace = $group->parent;
    $topic = $group;

@endphp
@extends('layouts.user-header-and-footer')
@section('html_title', implode(' | ', [$topic->name, $workspace->name, $root->name]))
@push('body')
    <x-container>

        {{-- Navigation --}}
        <ul class="mb-5">
            <li><a href="{{ route('group.show', $root) }}" class="underline">{{ $root->name }}</a></li>
            <li><a href="{{ route('group.show', $workspace) }}" class="underline">{{ $workspace->name }}</a></li>
            <li>{{ $topic->name }}</li>
        </ul>

        <h1 class="mb-3 font-bold text-lg">{{ $topic->name }}</h1>

        {{-- State --}}
        <h2 class="mb-0.5">Pick a governing body:</h2>

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

        <h3 class="mt-12 mb-1 font-semibold border-t-4 border-gray-300 pt-2">
            Bookmarks under this
            <span class="bg-gray-200 px-1">TOPIC</span>
        </h3>

        <div>
            {{ view('pages.user.group.partials.navigate-session-years', compact('session_years')) }}
        </div>

        <h3 class="mt-4 mb-0 font-bold tracking-tight">{{ $page_query_year }}</h3>
        {{ view('pages.user.group.partials.table-of-bookmarks', compact('bookmarks')) }}

    </x-container>
@endpush
