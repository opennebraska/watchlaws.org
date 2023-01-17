@php

    $root = $group->parent->parent;
    $workspace = $group->parent;
    $topic = $group;

@endphp@extends('layouts.user-header-and-footer')
@section('html_title', 'Bill Search')
@push('body')
    <x-container>

        <div class="mb-4">
            {{ view('pages.user.group.partials.saved-navigation-choices', compact('group', 'session_years')) }}
        </div>

        {{-- Navigation --}}
        <div class="mb-5">
            <a href="{{ route('group.show', $root) }}" class="underline">{{ $root->name }}</a>
            > <a href="{{ route('group.show', $workspace) }}" class="underline">{{ $workspace->name }}</a>
            > <a href="{{ route('group.show', $topic) }}" class="underline">{{ $topic->name }}</a></li>
            > Search</li>
        </div>

        {{ view('pages.user.group.partials.topic-header', compact('group', 'topic', 'session_years')) }}

        <h2 class="mt-6 mb-2 text-xl font-light">Search</h2>

        @livewire('bill-table', ['scope' => $topic])

    </x-container>
@endpush
