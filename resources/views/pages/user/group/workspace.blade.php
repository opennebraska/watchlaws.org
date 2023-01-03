@extends('layouts.user-header-and-footer')
@section('html_title', $group->name.' | '.$session->short_description.' | '.$state->name.' | '.$group->parent->name)
@push('body')
    <x-container>

        {{-- Navigation --}}
        <ul class="mb-5">
            <li><a href="{{ route('group.show', $group->parent) }}" class="underline">{{ $group->parent->name }}</a></li>
            <li><a href="{{ route('group.state.show', [$group->parent, $state->abbreviation]) }}" class="underline">{{ $state->name }}</a></li>
            <li><a href="{{ route('group.session.show', [$group->parent, $state->abbreviation, $session]) }}" class="underline">{{ $session->short_description }}</a></li>
            <li>{{ $group->name }}</li>
        </ul>

        {{-- Topics --}}
        <h2 class="mb-1 font-semibold text-lg">Topics</h2>
        @foreach ($group->children()->topics()->get() as $topic)

            <div class="pb-1">
                <a href="{{ route('group.session.show', [$topic, $state->abbreviation, $session]) }}"
                    class="underline"
                    >{{ $topic->name }}</a>
            </div>

        @endforeach

    </x-container>
@endpush
