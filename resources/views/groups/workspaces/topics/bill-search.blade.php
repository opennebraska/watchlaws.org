@extends('layouts.user-header-and-footer')
@section('html_title', 'Bill Search')
@push('body')
    <x-container>

        <div class="mb-4">

            {{-- Saved navigation choices --}}
            {{ view('partials.saved-navigation-choices')->withGroup($group) }}

        </div>

        {{-- Navigation --}}
        <div class="mb-5">
            <a href="{{ route('groups.show', $group) }}" class="underline">{{ $group->name }}</a>
            > <a href="{{ route('groups.workspaces.show', [$group, $workspace]) }}" class="underline">{{ $workspace->name }}</a>
            > <a href="{{ route('groups.workspaces.topics.show', [$group, $workspace, $topic]) }}" class="underline">{{ $topic->name }}</a></li>
            > Search</li>
        </div>

        <h1 class="mb-3 font-bold text-lg">{{ $topic->name }}</h1>

        <h2 class="mt-6 mb-2 text-xl font-light">Search</h2>

        @livewire('bill-table', ['scope'=>$topic, 'group'=>$group])

    </x-container>
@endpush
