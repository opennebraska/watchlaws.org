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
        <h2 class="mb-1 font-semibold">Pick state</h2>
        @foreach (config('enum.legiscan_states') as $state => $label)

            <a href="{{ route('group.state.show', [$group, $state]) }}"
                class="w-48 inline-block underline"
                >{{ $label }}</a>

        @endforeach

    </x-container>
@endpush
