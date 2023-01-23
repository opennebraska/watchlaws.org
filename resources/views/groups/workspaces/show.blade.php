@extends('layouts.user-header-and-footer')
@section('html_title', $workspace->name.' | '.$group->name)
@push('body')
    <x-container>

        <div class="mb-4">

            {{-- Saved navigation choices --}}
            {{ view('groups.partials.saved-navigation-choices')->withGroup($group) }}

        </div>

        {{-- Navigation --}}
        <div class="mb-5">
            <a href="{{ route('groups.show', $group) }}" class="underline">{{ $group->name }}</a>
            > {{ $workspace->name }}
        </div>

        <h1 class="mb-5 font-bold text-lg">{{ $workspace->name }}</h1>

        {{-- State --}}
        <div class="mb-6">

            <h2 class="mb-0.5 font-semibold">For {{ $group->chosenState()->name }} in {{ $group->chosenYear() }}</h2>

            <a href="{{ route('groups.workspaces.states.years.hearings.index', [$group, $workspace, $group->chosenState(), $group->chosenYear()]) }}" class="underline">Hearings</a>

        </div>

        {{-- Topics --}}
        <h2 class="mb-0.5 font-semibold">Topics</h2>

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

        {{ view('groups.workspaces.partials.bookmarks.table')->withWorkspace($workspace) }}

    </x-container>
@endpush
