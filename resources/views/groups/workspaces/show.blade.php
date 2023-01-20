@extends('layouts.user-header-and-footer')
@section('html_title', $workspace->name.' | '.$group->name)
@push('body')
    <x-container>

        <div class="mb-4">

            {{-- Saved navigation choices --}}
            {{ view('partials.saved-navigation-choices')->withGroup($group) }}

        </div>

        {{-- Navigation --}}
        <div class="mb-5">
            <a href="{{ route('groups.show', $group) }}" class="underline">{{ $group->name }}</a>
            > {{ $workspace->name }}
        </div>

        <h1 class="mb-5 font-bold text-lg">{{ $workspace->name }}</h1>

        {{-- Topics --}}
        <h2 class="mb-0.5">Pick a topic:</h2>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-y-1">
            @foreach ($workspace->topics as $topic)

                <div>
                    <a href="{{ route('groups.workspaces.topics.show', [$group, $workspace, $topic]) }}"
                        class="underline"
                        >{{ $topic->name }}</a>
                </div>

            @endforeach
        </div>

        <div class="flex mt-12 mb-4 border-t-4 border-gray-300 pt-3">
            <h3 class="font-semibold ">
                Bookmarks under
                <span class="bg-gray-200 px-1">{{ $workspace->name }}</span>
                for {{ $group->chosenYear() }} ({{ $group->chosenState() ? $group->chosenState()->name : 'ALL STATES' }})
            </h3>
        </div>

        {{ view('partials.bookmarks.table')->withBookmarks($workspace->findBookmarks()) }}

    </x-container>
@endpush
