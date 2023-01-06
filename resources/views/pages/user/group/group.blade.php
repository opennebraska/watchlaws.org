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
        @foreach ($group->children()->workspaces()->get() as $workspace)

            <div class="pb-1">
                <a href="{{ route('group.show', [$workspace]) }}"
                    class="underline"
                    >{{ $workspace->name }}</a>
            </div>

        @endforeach

    </x-container>
@endpush
