@extends('layouts.user-header-and-footer')
@section('html_title', $group->name)
@push('body')
    <x-container>

        <div class="mb-4">

            {{-- Saved navigation choices --}}
            {{ view('groups.partials.saved-navigation-choices')->withGroup($group) }}

        </div>

        {{-- Navigation --}}
        <div class="mb-5">
            {{ $group->name }}
        </div>

        {{-- Group info --}}
        <div class="flex items-baseline mb-5">
            <h1 class="font-bold text-lg mr-3">{{ $group->name }}</h1>
            <nav>
                <a href="{{ route('groups.members.index', $group) }}" class="hover:underline text-gray-500">members</a>
            </nav>
        </div>

        {{-- Workspaces --}}
        <h2 class="mb-0.5">Pick a workspace:</h2>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-y-1">
            @foreach ($group->workspaces as $workspace)

                <div>
                    <a href="{{ route('groups.workspaces.show', [$group, $workspace, 'year'=>request()->query('year')]) }}"
                        class="underline"
                        >{{ $workspace->name }}</a>
                </div>

            @endforeach
        </div>

        <div class="flex mt-12 mb-4 border-t-4 border-gray-300 pt-3">
            <h3 class="font-semibold ">
                Bookmarks under
                <span class="bg-gray-200 px-1">{{ $group->name }}</span>
                for {{ $group->chosenYear() }} ({{ $group->chosenState() ? $group->chosenState()->name : 'ALL STATES' }})
            </h3>
        </div>

        {{ view('groups.partials.bookmarks.table')->withGroup($group) }}

    </x-container>
@endpush
