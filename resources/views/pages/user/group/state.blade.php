@extends('layouts.user-header-and-footer')
@section('html_title', $state->name.' | '.$group->name)
@push('body')
    <x-container>

        {{-- Navigation --}}
        <ul class="mb-5">
            <li><a href="{{ route('group.show', $group) }}" class="underline">{{ $group->name }}</a></li>
            <li>{{ $state->name }}</li>
        </ul>

        {{-- Sessions --}}
        <h2 class="mb-1 font-semibold text-lg">Sessions</h2>
        @foreach ($state->sessions as $session)

            <a href="{{ route('group.session.show', [$group, $state->abbreviation, $session->id]) }}"
                class="underline"
                >{{ $session->title }}</a>

        @endforeach

    </x-container>
@endpush
