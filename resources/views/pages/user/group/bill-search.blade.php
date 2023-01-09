@php

    $root = $group->parent->parent;
    $workspace = $group->parent;
    $topic = $group;

@endphp@extends('layouts.user-header-and-footer')
@section('html_title', 'Bill Search')
@push('body')
    <x-container>

        {{-- Navigation --}}
        <ul class="mb-5">
            <li><a href="{{ route('group.show', $root) }}" class="underline">{{ $root->name }}</a></li>
            <li><a href="{{ route('group.show', $workspace) }}" class="underline">{{ $workspace->name }}</a></li>
            <li><a href="{{ route('group.show', $topic) }}?choose-state=1" class="underline">{{ $topic->name }}</a></li>
            <li><a href="{{ route('group.state.show', [$topic, $state->abbreviation]) }}" class="underline">{{ $state->name }}</a></li>
            <li>{{ $session->name }}</li>
        </ul>

        <h1 class="mb-3 font-bold text-lg">{{ $group->name }}</h1>
        <h1 class="mb-3 font-semibold">{{ $state->name }}, {{ $session->short_description }}</h1>

        <h2 class="mt-6 mb-2 text-xl font-light">Manage Bookmarks</h2>

        <nav class="mb-6">
            <a href="{{ route('group.session.show', [$topic, $state->abbreviation, $session]) }}" class="underline">bookmarks</a>
            <a href="{{ route('group.bill-search.show', [$topic, $state->abbreviation, $session]) }}" class="ml-1">search</a>
        </nav>

        @livewire('bill-table', ['state' => $state, 'session' => $session, 'scope' => $topic])

    </x-container>
@endpush
