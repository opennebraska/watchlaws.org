@extends('layouts.user-header-and-footer')
@section('html_title', 'About '.$group->name)
@push('body')
    <x-container>

        {{ view('groups.partials.header')->withGroup($group) }}

        <div class="mb-6">
            {{ view('groups.workspaces.partials.header')->withGroup($group)->withWorkspace($workspace) }}
        </div>

        <h2 class="mb-3">Hearings for {{ $state->name }} in {{ $year }}</h2>

        <x-table>
            @slot('header')
                <x-table.header>

                    Hearing

                </x-table.header>
                <x-table.header>

                    Bill

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
                    </x-table.row>

                @empty

                    <x-table.row>
                        <x-table.cell colspan="2">

                            Hearings not found

                        </x-table.cell>
                    </x-table.row>

                @endforelse
            @endslot
        </x-table>

    </x-container>
@endpush
