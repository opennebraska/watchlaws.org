@extends('layouts.user-header-and-footer')
@section('html_title', 'Bill Search')
@push('body')
    <x-container>

        {{ view('groups.partials.header')->withGroup($group) }}

        <div class="mb-4">
            {{ view('groups.workspaces.partials.header')->withGroup($group)->withWorkspace($workspace) }}
        </div>

        <div class="mb-8">
            {{ view('groups.partials.saved-navigation-choices')->withGroup($group) }}
        </div>

        <div class="flex items-baseline">
            <h3 class="font-semibold mb-2">Bill Search</h3>
            <nav class="ml-3">

                <a
                    href="{{ route('groups.workspaces.show', [$group, $workspace]) }}"
                    class="px-4 py-1 rounded-md border border-1 bg-gray-200 hover:bg-gray-300 border-gray-300"
                    >Back to bookmarks</a>

            </nav>
        </div>


        @livewire('workspace.bill.search', ['scope'=>$workspace, 'group'=>$group])

    </x-container>
@endpush
