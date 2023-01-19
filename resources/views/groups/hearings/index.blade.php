@extends('layouts.user-header-and-footer')
@section('html_title', 'About '.$group->name)
@push('body')
    <x-container>

        <div class="mb-4 flex">
            {{ view('partials.saved-navigation-choices', compact('group', 'session_years')) }}
            <div class="bg-gray-200 px-4 py-4 flex-grow">

                <a href="{{ route('groups.hearings.index', $group) }}" class="underline">Hearings</a>

            </div>
        </div>

        {{-- Navigation --}}
        <nav class="mb-5">
            <a href="{{ route('groups.show', $group) }}" class="underline">{{ $group->name }}</a>
            > Hearings
        </nav>

        <h1 class="mb-3 font-bold text-lg">{{ $group->name }}</h1>

        {{-- Get all the hearings for Nebraska --}}

    </x-container>
@endpush
