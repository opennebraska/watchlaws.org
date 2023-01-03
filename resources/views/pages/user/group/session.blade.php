@extends('layouts.user-header-and-footer')
{{-- @section('html_title', '') --}}
@push('body')
    <x-container>

        {{-- Navigation --}}
        <ul class="mb-5">
            <li><a href="{{ route('group.show', $group) }}" class="underline">{{ $group->name }}</a></li>
            <li><a href="{{ route('group.state.show', [$group, $state->abbreviation]) }}" class="underline">{{ $state->name }}</a></li>
            <li>{{ $session->title }}</li>
        </ul>

        {{-- Workspaces --}}
        <h2 class="mb-1 font-semibold text-lg">Workspaces</h2>
        @foreach ($group->children()->workspaces()->get() as $workspace)

            <div class="pb-1">
                <a href="{{ route('group.session.show', [$workspace, $state->abbreviation, $session]) }}"
                    class="underline"
                    >{{ $workspace->name }}</a>
            </div>

        @endforeach

    </x-container>
@endpush
