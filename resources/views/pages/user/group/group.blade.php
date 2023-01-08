@extends('layouts.user-header-and-footer')
@section('html_title', $group->name)
@push('body')
    <x-container>

        {{-- Navigation --}}
        <ul class="mb-5">
            <li>{{ $group->name }}</li>
        </ul>

        <h1 class="mb-4 font-bold text-lg">{{ $group->name }}</h1>

        {{-- Workspaces --}}
        <h2 class="mb-1 font-semibold">Workspaces</h2>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-y-1">
            @foreach ($group->children()->workspaces()->get() as $workspace)

                <div>
                    <a href="{{ route('group.show', [$workspace]) }}"
                        class="underline"
                        >{{ $workspace->name }}</a>
                </div>

            @endforeach
        </div>

    </x-container>
@endpush
