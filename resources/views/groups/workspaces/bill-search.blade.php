@extends('layouts.user-header-and-footer')
@section('html_title', 'Bill Search')
@push('body')
    <x-container>

        {{ view('groups.partials.header')->withGroup($group) }}

        <div class="mb-2">
            {{ view('groups.workspaces.partials.header')->withGroup($group)->withWorkspace($workspace) }}
        </div>

        <div class="mb-8">
            {{ view('groups.partials.saved-navigation-choices')->withGroup($group) }}
        </div>

        <h3 class="font-semibold mb-2">Bill Search</h3>

        @livewire('bill-table', ['scope'=>$workspace, 'group'=>$group])

    </x-container>
@endpush
