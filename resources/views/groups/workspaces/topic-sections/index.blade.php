@extends('layouts.user-header-and-footer')
@section('html_title', $workspace->name.' | '.$group->name)
@push('body')
    <x-container>

        {{ view('groups.partials.header')->withGroup($group) }}

        {{ view('groups.workspaces.partials.header')->withGroup($group)->withWorkspace($workspace) }}

        <h3 class="font-semibold mb-2">Topics</h3>

        {{ $workspace->topicSecions }}

        {{-- @foreach ($workspace->topicSecions as $topicSection)

            <div>
                {{ $topicSection->name }}
            </div>

        @endforeach --}}

    </x-container>
@endpush
