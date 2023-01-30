@extends('layouts.user-header-and-footer')
@section('html_title', $workspace->name.' | '.$group->name)
@push('body')
    <x-container>

        {{ view('groups.partials.header')->withGroup($group) }}

        <div class="mb-4">
            {{ view('groups.workspaces.partials.header')->withGroup($group)->withWorkspace($workspace) }}
        </div>

        <div class="mb-8">
            {{ view('groups.partials.saved-navigation-choices')->withGroup($group) }}
        </div>

        <div class="flex items-baseline">
            <h3 class="font-semibold mb-2">Bookmarks</h3>
            <nav class="ml-3">

                <a
                    href="{{ route('groups.workspaces.bill-search.show', [$group, $workspace]) }}"
                    class="px-4 py-1 rounded-md bg-green-600 hover:bg-green-700 text-green-100 hover:text-white"
                    >Bill Search</a>

            </nav>
        </div>

        <div class="mb-1 font-light text-sm">
            Bookmarks under
            <strong class="font-semibold">{{ $workspace->name }}</strong>
            for {{ $group->chosenYear() }} ({{ $group->chosenState() ? $group->chosenState()->name : 'ALL STATES' }})
        </div>

        {{ view('groups.workspaces.partials.bookmarks.table')->withWorkspace($workspace) }}

    </x-container>
@endpush
