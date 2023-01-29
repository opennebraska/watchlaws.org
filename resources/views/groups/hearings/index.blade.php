@extends('layouts.user-header-and-footer')
@section('html_title', 'About '.$group->name)
@push('body')
    <x-container>

        {{ view('groups.partials.header')->withGroup($group) }}

        <h2 class="mb-2 text-xl">All Hearings</h2>

        <div class="mb-8">
            {{ view('groups.partials.saved-navigation-choices')->withGroup($group) }}
        </div>

        <h3 class="mb-2">Hearings by workspace:</h3>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-y-1">
            @foreach ($group->workspaces as $workspace)

                <div>
                    <a href="{{ route('groups.workspaces.hearings.index', [$group, $workspace]) }}"
                        class="underline"
                        >{{ $workspace->name }}</a>
                </div>

            @endforeach
        </div>

        <h3 class="mt-12 mb-3">
            {{-- Hearings for
            {{ $year }} ({{ $state->name }}) --}}
            All hearings for
            bookmarks </strong>
            for {{ $group->chosenYear() }} ({{ $group->chosenState()?->name ?? 'ALL STATES' }})

        </h3>

        <x-table>
            @slot('header')
            <x-table.header class="text-left text-sm">
                Hearing
            </x-table.header>
            <x-table.header class="text-left text-sm">
                Bill
            </x-table.header>
            <x-table.header class="text-left text-sm">
                Topics
            </x-table.header>
            <x-table.header class="text-left text-sm">
                Workspaces
            </x-table.header>
        @endslot
            @slot('body')
                @forelse ($historyItems as $historyItem)

                    <x-table.row>
                        <x-table.cell class=" w-96">

                            {{ view('partials.hearings.alert')->withHistoryItem($historyItem) }}

                        </x-table.cell>
                        <x-table.cell class="">

                            @php
                                $bill = $historyItem->bill;
                            @endphp

                            {{-- Summary --}}
                            <div class="group relative">
                                <div class="line-clamp-2">

                                    @if ($bill->title != $bill->description)
                                        <div class="text-black font-semibold truncate">
                                            {{ $bill->title }}
                                        </div>
                                    @endif
                                    <div class=" text-gray-700">
                                        {{ $bill->description }}
                                    </div>

                                </div>
                                <div class="hidden group-hover:block absolute z-20 top-full right-0 border border-gray-400 rounded-sm bg-gray-200 px-1 max-w-md">

                                    @if ($bill->title != $bill->description)
                                        <div class="text-black font-semibold">
                                            {{ $bill->title }}
                                        </div>
                                    @endif
                                    <div class="text-gray-700">
                                        {{ $bill->description }}
                                    </div>

                                </div>
                            </div>

                            {{-- Authors --}}
                            <div class="mt-1 text-xs text-gray-600">
                                @foreach ($bill->sponsors as $sponsor)

                                    <div>
                                        {{ $sponsor->person->name }}
                                        @if ($sponsor->person->party)
                                            ({{ $sponsor->person->party->name }})
                                        @endif
                                        <span class="text-gray-400">- {{ $sponsor->type->description }}</span>
                                    </div>

                                @endforeach
                            </div>

                            {{-- Info --}}
                            <div class="mt-1 mb-2 text-xs">

                                <a href="{{ $bill->state_url }}" class="underline"
                                    ><span class="text-gray-400">{{ $bill->number }}</span></a>

                                <span class="text-gray-500">{{ $bill->body->short_name }} {{ $bill->type->name }}</span>

                                @if ($bill->pending_committee->name ?? false)
                                    <span class="ml-1 pl-2 pr-2.5 py-0.5 bg-gray-200 text-gray-500">{{ $bill->pendingCommittee->name ?? '' }}</span>
                                @endif

                                @foreach ($bill->referrals as $referral)
                                    <span class="ml-1 pl-2 pr-2.5 py-0.5 shadow border border-gray-300 bg-gray-100 text-gray-500">{{ $referral->committee->name ?? '' }}</span>
                                @endforeach

                                @if ($bill->body && $bill->current_body && $bill->body->id != $bill->current_body->id)
                                    <span class="ml-1 pl-2 pr-2.5 py-0.5 bg-yellow-100 text-gray-500">Went to the {{ $bill->currentBody->short_name }}</span>
                                @endif

                            </div>
                        </x-table.cell>
                        <x-table.cell class="whitespace-nowrap text-sm">

                            @foreach ($bill->topics()->perGroup($group)->get() as $topic)
                                <div class="mb-2 last:mb-0">

                                    <div class="truncate max-w-xs">
                                        {{ $topic->name }}
                                    </div>
                                    <div class="text-xs text-slate-400 truncate max-w-xs">
                                        {{ $topic->section->name }}
                                    </div>
                                    <div class="text-xs text-slate-400 truncate max-w-xs text-gray-500">
                                        {{ $topic->workspace->name }}
                                    </div>

                                </div>
                            @endforeach

                        </x-table.cell>
                        <x-table.cell>

                            @php

                                $workspaces = collect();
                                foreach($group->workspaces as $workspace)
                                {
                                    if ($workspace->bookmarks()->where([['bookmarkable_type', get_class($bill)], ['bookmarkable_id', $bill->id]])->count())
                                    {
                                        $workspaces->push($workspace);
                                    }
                                }

                            @endphp

                            @foreach ($workspaces as $workspace)

                                <div class="mb-2 last:mb-0 text-xs">
                                    {{ $workspace->name }}
                                </div>

                            @endforeach

                        </x-table.cell>
                    </x-table.row>

                @empty

                    <x-table.row>
                        <x-table.cell colspan="2">

                            @if ($group->chosenState()->abbreviation == 'NE')
                                Hearings not found
                            @else
                                <i>Hearings for {{ $group->chosenState()->name }} are not available on WatchLaws.org</i>
                            @endif

                        </x-table.cell>
                    </x-table.row>

                @endforelse
            @endslot
        </x-table>

    </x-container>
@endpush
