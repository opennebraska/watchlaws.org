@extends('layouts.user-header-and-footer')
@section('html_title', $group->name)
@push('body')
    <x-container>

        {{-- Navigation --}}
        <ul class="mb-5">
            <li>{{ $group->name }}</li>
        </ul>

        <div class="mb-4">
            {{ view('pages.user.group.partials.saved-navigation-choices', compact('group')) }}
        </div>

        <div class="flex items-baseline mb-5">
            <h1 class="font-bold text-lg mr-3">{{ $group->name }}</h1>
            <nav>
                <a href="{{ route('group.about.show', compact('group')) }}" class="hover:underline text-gray-500">about</a>
            </nav>
        </div>

        {{-- Workspaces --}}
        <h2 class="mb-0.5">Pick a workspace:</h2>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-y-1">
            @foreach ($group->children()->workspaces()->get() as $workspace)

                <div>
                    <a href="{{ route('group.show', [$workspace, 'year'=>request()->query('year')]) }}"
                        class="underline"
                        >{{ $workspace->name }}</a>
                </div>

            @endforeach
        </div>

        <h3 class="mt-12 mb-3 font-semibold border-t-4 border-gray-300 pt-1">
            Bookmarks under this
            <span class="bg-gray-200 px-1">GROUP</span>
            for {{ $group->chosenYear() }}
        </h3>

        {{ view('pages.user.group.partials.table-of-bookmarks', compact('bookmarks')) }}

    </x-container>
@endpush
