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

        <nav class="pb-1 mb-6 border-b">
            <a href="{{ route('group.session.show', [$topic, $state->abbreviation, $session]) }}" class="underline">bookmarks</a>
            <a href="{{ route('group.bill-search.show', [$topic, $state->abbreviation, $session]) }}" class="font-semibold ml-1">search</a>
        </nav>

        <h2 class=" text-xl font-bold mb-3">Bill search</h2>

        @livewire('bill-table', ['state' => $state, 'session' => $session, 'scope' => $topic])

    </x-container>
@endpush
