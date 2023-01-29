@extends('layouts.user-header-and-footer')
@section('html_title', $group->name)
@push('body')
    <x-container>

        {{ view('groups.partials.header')->withGroup($group) }}

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

    </x-container>
@endpush
