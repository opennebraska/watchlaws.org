@php

    $root = $group->parent->parent;
    $workspace = $group->parent;
    $topic = $group;

@endphp
@extends('layouts.user-header-and-footer')
@section('html_title', $topic->name.' | '.$workspace->name.' | '.$session->title.' | '.$state->name.' | '.$root->name)
@push('body')
    <x-container>

        {{-- Navigation --}}
        <ul class="mb-5">
            <li><a href="{{ route('group.show', $root) }}" class="underline">{{ $root->name }}</a></li>
            <li><a href="{{ route('group.state.show', [$root, $state->abbreviation]) }}" class="underline">{{ $state->name }}</a></li>
            <li><a href="{{ route('group.session.show', [$root, $state->abbreviation, $session]) }}" class="underline">{{ $session->title }}</a></li>
            <li><a href="{{ route('group.session.show', [$workspace, $state->abbreviation, $session]) }}" class="underline">{{ $workspace->name }}</a></li>
            <li>{{ $topic->name }}</li>
        </ul>

        <nav class="pb-1 mb-6 border-b">
            <a href="{{ route('group.session.show', [$topic, $state->abbreviation, $session]) }}" class="font-semibold">bookmarks</a>
            <a href="{{ route('group.bill-search.show', [$topic, $state->abbreviation, $session]) }}" class="underline ml-1">search</a>
        </nav>

        <h2 class="text-lg font-bold mb-2">Bookmarks</h2>

        <x-table class="table-auto">
            @slot('header')
                <x-table.header class="text-left text-sm">
                    Summary
                </x-table.header>
                <x-table.header class="text-left text-sm">
                    Status
                </x-table.header>
            @endslot
            @slot('body')
                @forelse ($group->bookmarks()->bills()->get() as $bookmark)

                    @php

                        $bill = $bookmark->bookmarkable;

                    @endphp

                    <x-table.row class="border-b">
                        <x-table.cell class="w-full max-w-0">

                            {{-- Summary --}}
                            <span class="group relative">
                                <span class="line-clamp-3">

                                    @if ($bill->title != $bill->description)
                                        <div class="text-black font-semibold truncate">
                                            <a href="{{ $bill->state_url }}" class="underline">{{ $bill->bill_number }}</a> &ndash;
                                            {{ $bill->title }}
                                        </div>
                                    @endif
                                    <div>
                                        @if ($bill->title == $bill->description)
                                            <a href="{{ $bill->state_url }}" class="font-semibold underline">{{ $bill->bill_number }}</a> &ndash;
                                        @endif
                                        <span class="text-gray-500">{{ $bill->description }}</span>
                                    </div>

                                </span>
                                <span class="hidden group-hover:block absolute z-20 top-full right-0 border border-gray-400 rounded-sm bg-gray-200 px-1 max-w-md">

                                    @if ($bill->title != $bill->description)
                                        <div class="text-black font-semibold">
                                            {{ $bill->title }}
                                        </div>
                                    @endif
                                    <div class="text-gray-500">
                                        {{ $bill->description }}
                                    </div>

                                </span>
                            </span>


                            {{-- <div class="max-h-32 line-clamp-5">

                                @if ($bill->title != $bill->description)
                                    <div class="text-black font-semibold truncate">
                                        {{ $bill->title }}
                                    </div>
                                @endif

                                <div class="text-gray-500 truncate">
                                    {{ $bill->description }}
                                </div>

                            </div> --}}

                        </x-table.cell>
                        <x-table.cell class="whitespace-nowrap text-sm">

                            {{-- Latest --}}
                            <div>
                                {{ $bill->historyItems()->orderByDesc('history_date')->first()->history_date }}
                            </div>

                            {{-- Action --}}
                            <div class="truncate max-w-xs">
                                {{ $bill->historyItems()->orderByDesc('history_date')->first()->history_action }}
                            </div>

                            {{-- Status --}}
                            <div>
                                {{ $bill->status->progress_desc }}
                            </div>

                        </x-table.cell>
                    </x-table.row>

                @empty

                    <x-table.cell colspan="6" class="h-14 px-4 border-b">

                        <span class="text-gray-500">
                            (No results)
                        </span>

                    </x-table.cell>

                @endforelse
            @endslot
        </x-table>

    </x-container>
@endpush
