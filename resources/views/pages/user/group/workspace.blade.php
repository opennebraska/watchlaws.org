@php

    $root = $group->parent;
    $workspace = $group;

@endphp
@extends('layouts.user-header-and-footer')
@section('html_title', $workspace->name.' | '.$root->name)
@push('body')
    <x-container>

        {{-- Navigation --}}
        <ul class="mb-5">
            <li><a href="{{ route('group.show', $root) }}" class="underline">{{ $root->name }}</a></li>
            <li>{{ $workspace->name }}</li>
        </ul>

        <h1 class="mb-3 font-bold text-lg">{{ $workspace->name }}</h1>

        {{-- Topics --}}
        <h2 class="mb-0.5">Pick a topic:</h2>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-y-1">
            @foreach ($workspace->children()->topics()->get() as $topic)

                <div>
                    <a href="{{ route('group.show', [$topic]) }}"
                        class="underline"
                        >{{ $topic->name }}</a>
                </div>

            @endforeach
        </div>

        <h3 class="mt-12 mb-1 font-semibold border-t-4 border-gray-300 pt-2">
            Bookmarks under this
            <span class="bg-gray-200 px-1">WORKSPACE</span>
        </h3>

        <div>
            {{ view('pages.user.group.partials.navigate-session-years', compact('session_years')) }}
        </div>

        <h3 class="mt-4 mb-0 font-bold tracking-tight">{{ $page_query_year }}</h3>
        {{ view('pages.user.group.partials.table-of-bookmarks', compact('bookmarks')) }}

    </x-container>
@endpush
