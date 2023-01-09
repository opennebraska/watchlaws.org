@php

    $root = $group->parent->parent;
    $workspace = $group->parent;
    $topic = $group;

@endphp
@extends('layouts.user-header-and-footer')
@section('html_title', implode(' | ', [$state->name, $topic->name, $workspace->name, $root->name]))
@push('body')
    <x-container>

        {{-- Navigation --}}
        <ul class="mb-5">
            <li><a href="{{ route('group.show', $root) }}" class="underline">{{ $root->name }}</a></li>
            <li><a href="{{ route('group.show', $workspace) }}" class="underline">{{ $workspace->name }}</a></li>
            <li><a href="{{ route('group.show', $topic) }}" class="underline">{{ $topic->name }}</a></li>
            <li>{{ $state->name }}</li>
        </ul>

        <h1 class="mb-3 font-bold text-lg">{{ $group->name }}</h1>

        <h1 class="mb-3 font-semibold">{{ $state->name }}</h1>

        {{-- Sessions --}}
        <h2 class="mb-0.5">Pick a session:</h2>
        @foreach ($state->sessions()->orderByDesc('year_end')->orderByDesc('year_start')->get() as $session)

            <div>
                <a href="{{ route('group.session.show', [$group, $state->abbreviation, $session->id]) }}"
                    class="underline"
                    >{{ $session->short_description }}</a>
            </div>

        @endforeach

    </x-container>
@endpush
