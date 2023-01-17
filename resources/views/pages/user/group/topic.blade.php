@php

    $root = $group->parent->parent;
    $workspace = $group->parent;
    $topic = $group;

@endphp
@extends('layouts.user-header-and-footer')
@section('html_title', implode(' | ', [$topic->name, $workspace->name, $root->name]))
@push('body')
    <x-container>

        <div class="mb-4">
            {{ view('pages.user.group.partials.saved-navigation-choices', compact('group', 'session_years')) }}
        </div>

        {{-- Navigation --}}
        <div class="mb-5">
            <a href="{{ route('group.show', $root) }}" class="underline">{{ $root->name }}</a>
            > <a href="{{ route('group.show', $workspace) }}" class="underline">{{ $workspace->name }}</a>
            > {{ $topic->name }}</li>
        </div>

        {{ view('pages.user.group.partials.topic-header', compact('group', 'topic', 'session_years')) }}

        <div class="mt-5">
            <a href="{{ route('group.bill-search.show', compact('group')) }}" class="text-white bg-green-600 tracking-wider px-3 py-1 rounded-xl">Search</a>
        </div>

        <div class="flex mt-12 mb-4 border-t-4 border-gray-300 pt-3">
            <h3 class="font-semibold ">
                Bookmarks under
                <span class="bg-gray-200 px-1">{{ $group->name }}</span>
                for {{ $group->chosenYear() }} ({{ $group->chosenState() ? $group->chosenState()->name : 'ALL STATES' }})
            </h3>
            {{-- <div>
                <a href="" class="ml-2 text-white bg-green-600 tracking-wider px-3 py-1 rounded-xl">Search</a>
            </div> --}}
        </div>

        {{ view('pages.user.group.partials.table-of-bookmarks', compact('bookmarks')) }}

    </x-container>
@endpush
