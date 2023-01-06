@php

    $root = $group->parent;
    $workspace = $group;

@endphp
@extends('layouts.user-header-and-footer')
{{-- @section('html_title', $group->name.' | '.$session->short_description.' | '.$state->name.' | '.$group->parent->name) --}}
@push('body')
    <x-container>

        {{-- Navigation --}}
        <ul class="mb-5">
            <li><a href="{{ route('group.show', $root) }}" class="underline">{{ $root->name }}</a></li>
            <li>{{ $workspace->name }}</li>
        </ul>

        <h1 class="mb-4 font-bold text-lg">{{ $workspace->name }}</h1>

        {{-- Topics --}}
        <h2 class="mb-1 font-semibold">Topics</h2>
        @foreach ($workspace->children()->topics()->get() as $topic)

            <div class="pb-1">
                <a href="{{ route('group.show', [$topic]) }}"
                    class="underline"
                    >{{ $topic->name }}</a>
            </div>

        @endforeach

    </x-container>
@endpush
