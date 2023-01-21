@extends('layouts.user-header-and-footer')
@section('html_title', implode(' | ', [$topic->name, $workspace->name, $group->name]))
@push('body')
    <x-container>

        <div class="mb-4">

            {{-- Saved navigation choices --}}
            {{ view('partials.saved-navigation-choices')->withGroup($group) }}

        </div>

        {{-- Navigation --}}
        <div class="mb-5">
            <a href="{{ route('groups.show', $group) }}" class="underline">{{ $group->name }}</a>
            > <a href="{{ route('groups.workspaces.show', [$group, $workspace]) }}" class="underline">{{ $workspace->name }}</a>
            > {{ $topic->name }}</li>
        </div>

        <h1 class="mb-3 font-bold text-lg">{{ $topic->name }}</h1>

        <div class="mt-5">
            <a href="{{ route('groups.workspaces.topics.bill-search.show', [$group, $workspace, $topic]) }}" class="text-white bg-green-600 tracking-wider px-3 py-1 rounded-xl">Search</a>
        </div>

        <div class="flex mt-12 mb-4 border-t-4 border-gray-300 pt-3">
            <h3 class="font-semibold ">
                Bookmarks under
                <span class="bg-gray-200 px-1">{{ $topic->name }}</span>
                for {{ $group->chosenYear() }} ({{ $group->chosenState() ? $group->chosenState()->name : 'ALL STATES' }})
            </h3>
        </div>

        {{ view('partials.bookmarks.table')->withBookmarks($topic->findBookmarks()) }}

    </x-container>
@endpush
