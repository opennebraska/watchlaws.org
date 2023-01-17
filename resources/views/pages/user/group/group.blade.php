@extends('layouts.user-header-and-footer')
@section('html_title', $group->name)
@push('body')
    <x-container>

        {{-- Saved navigation choices --}}
        <div class="mb-4">
            {{ view('pages.user.group.partials.saved-navigation-choices', compact('group', 'session_years')) }}
        </div>

        {{-- Navigation --}}
        <div class="mb-5">
            {{ $group->name }}
        </div>

        {{ view('pages.user.group.partials.group-header', compact('group', 'session_years')) }}

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
