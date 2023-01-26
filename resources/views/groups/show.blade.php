@extends('layouts.user-header-and-footer')
@section('html_title', $group->name)
@push('body')
    <x-container>

        {{-- Group header --}}
        <div class="flex items-baseline mb-5">
            <h1 class="font-bold text-lg mr-3">
                <a href="{{ route('groups.show', $group) }}" class="hover:underline">{{ $group->name }}</a>
            </h1>
            <nav>
                <a href="{{ route('groups.show', $group) }}" class="hover:underline text-gray-500 ml-1">group</a>
                <a href="{{ route('groups.members.index', $group) }}" class="hover:underline text-gray-500 ml-2">members</a>
            </nav>
        </div>

        {{-- Workspaces --}}
        <h3 class="font-semibold mb-2">
            Workspaces
        </h3>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-y-1">
            @foreach ($group->workspaces as $workspace)

                <div>
                    <a href="{{ route('groups.workspaces.show', [$group, $workspace, 'year'=>request()->query('year')]) }}"
                        class="underline"
                        >{{ $workspace->name }}</a>
                </div>

            @endforeach
        </div>

        <div class="mt-10">
            <a href="{{ route('groups.bookmarks.index', $group) }}" class="hover:underline text-gray-500">Browse all bookmarks</a>
        </div>

    </x-container>
@endpush
