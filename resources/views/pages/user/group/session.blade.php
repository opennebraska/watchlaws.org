@php

    $root = $group->parent->parent;
    $workspace = $group->parent;
    $topic = $group;

@endphp
@extends('layouts.user-header-and-footer')
@section('html_title', $session->short_description.' | '.$state->name.' | '.$group->name)
@push('body')
    <x-container>

        {{-- Navigation --}}
        <ul class="mb-5">
            <li><a href="{{ route('group.show', $root) }}" class="underline">{{ $root->name }}</a></li>
            <li><a href="{{ route('group.show', $workspace) }}" class="underline">{{ $workspace->name }}</a></li>
            <li><a href="{{ route('group.show', $topic) }}?choose-state=1" class="underline">{{ $topic->name }}</a></li>
            <li><a href="{{ route('group.state.show', [$topic, $state->abbreviation]) }}" class="underline">{{ $state->name }}</a></li>
            <li>{{ $session->name }}</li>
        </ul>

        <nav class="pb-1 mb-6 border-b">
            <a href="{{ route('group.session.show', [$topic, $state->abbreviation, $session]) }}" class="font-semibold">bookmarks</a>
            <a href="{{ route('group.bill-search.show', [$topic, $state->abbreviation, $session]) }}" class="underline ml-1">search</a>
        </nav>

        <h2 class="text-lg font-bold mb-2">Bookmarks</h2>

        <x-table class="table-auto">
            @slot('header')
                <x-table.header>

                </x-table.header>
                <x-table.header class="text-left text-sm">
                    Summary
                </x-table.header>
                <x-table.header class="text-left text-sm">
                    Status
                </x-table.header>
            @endslot
            @slot('body')
                @forelse ($topic->bookmarks()->bills()->get() as $bookmark)

                    @php

                        $bill = $bookmark->bookmarkable;

                    @endphp

                    <x-table.row class="border-b">
                        <x-table.cell class="whitespace-nowrap text-center">

                            {{-- State seal --}}
                            @if (\File::exists(public_path('/media/us_states/seals/'.$bill->state->abbreviation.'.svg')))
                                <img src="/media/us_states/seals/{{ $bill->state->abbreviation }}.svg" alt="" class="h-12 max-w-none inline-block" />
                            @endif
                            <div class="leading-none">
                                <span class="text-xs text-gray-400">{{ $bill->state->abbreviation }}</span>
                            </div>

                        </x-table.cell>
                            <x-table.cell class="w-full max-w-0">

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
