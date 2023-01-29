@extends('layouts.user-header-and-footer')
@section('html_title', $workspace->name.' | '.$group->name)
@push('body')
    <x-container>

        {{ view('groups.partials.header')->withGroup($group) }}

        <div class="mb-2">
            {{ view('groups.workspaces.partials.header')->withGroup($group)->withWorkspace($workspace) }}
        </div>

        <div class="mb-8">
            {{ view('groups.partials.saved-navigation-choices')->withGroup($group) }}
        </div>

        <div class="mb-8">

            {{-- Hearings --}}
            @if ($group->chosenState()?->abbreviation == 'NE')
                <div class="mb-1">
                    <a href="{{ route('groups.workspaces.hearings.index', [$group, $workspace]) }}" class="underline">Hearings ({{ $group->chosenYear() }}, {{ $group->chosenState()->name }})</a>
                </div>
            @endif

        </div>

        <div class="flex items-baseline">
            <h3 class="font-semibold mb-2">Bookmarks</h3>
            <nav class="ml-3">
                <a href="{{ route('groups.workspaces.bill-search.show', [$group, $workspace]) }}" class="underline text-gray-600">search</a>
            </nav>
        </div>

        <div class="mb-1 font-light text-sm">
            Bookmarks under
            <strong class="font-semibold">{{ $workspace->name }}</strong>
            {{-- <span class="bg-gray-200 px-1 py-1">{{ $workspace->name }}</span> --}}
            for {{ $group->chosenYear() }} ({{ $group->chosenState() ? $group->chosenState()->name : 'ALL STATES' }})
        </div>

        {{ view('groups.workspaces.partials.bookmarks.table')->withWorkspace($workspace) }}

    </x-container>
@endpush
