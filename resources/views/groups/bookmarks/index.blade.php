@extends('layouts.user-header-and-footer')
@section('html_title', $group->name)
@push('body')
    <x-container>

        {{ view('groups.partials.header')->withGroup($group) }}

        <div class="text-xl mb-2">All Bookmarks</div>

        <div class="mb-4">

            {{-- Saved navigation choices --}}
            {{ view('groups.partials.saved-navigation-choices')->withGroup($group) }}

        </div>

        <div class="mb-1 font-light text-sm">
            All bookmarks for {{ $group->chosenYear() }} ({{ $group->chosenState()?->name ?? 'ALL STATES' }})
        </div>

        {{ view('groups.partials.bookmarks.table')->withGroup($group) }}

    </x-container>
@endpush
