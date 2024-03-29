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
        <x-table.header class="text-left text-sm">
            Topics
        </x-table.header>
    @endslot
    @slot('body')
        @forelse ($topic->findBookmarks()->groupBy('bookmarkable.id') as $billId => $bookmarks)
            @php

                $bill = $bookmarks->first()->bookmarkable;

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

                    @php
                        $billHistory = $bill->history()->whereIsNebraskaHearing()->get();
                    @endphp
                    @if ($billHistory->isNotEmpty())

                        @foreach ($billHistory as $historyItem)

                            {{ view('partials.hearings.alert')->withHistoryItem($historyItem) }}

                        @endforeach

                    @endif

                </x-table.cell>
                <x-table.cell class="whitespace-nowrap text-sm">

                    {{-- Latest --}}
                    <div>
                        {{ $bill->history()->orderByDesc('history_date')->first()->history_date->format('Y-m-d') ?? '' }}
                    </div>

                    {{-- Action --}}
                    <div class="truncate max-w-xs">
                        {{ $bill->history()->orderByDesc('history_date')->first()->history_action ?? '' }}
                    </div>

                    {{-- Status --}}
                    <div>
                        {{ $bill->status->progress_desc ?? '' }}
                    </div>

                </x-table.cell>
                <x-table.cell class="whitespace-nowrap text-sm">

                    @foreach ($bill->topics()->perWorkspace($topic->workspace)->get() as $topic)
                        <div class="mb-2 last:mb-0">

                            <div class="truncate max-w-xs">
                                <a href="{{ route('groups.workspaces.topics.bill-search.show', [$topic->workspace->group, $topic->workspace, $topic, 'q'=>$bill->number]) }}"
                                    class="underline"
                                    >{{ $topic->name }}</a>
                            </div>
                            <div class="text-xs text-slate-400 truncate max-w-xs">
                                {{ $topic->section->name }}
                            </div>

                        </div>
                    @endforeach

                </x-table.cell>
            </x-table.row>

        @empty

            <x-table.cell colspan="6" class="h-14 px-4 border-b">

                <span class="text-gray-500">
                    (No bookmarks for this query)
                </span>

            </x-table.cell>

        @endforelse
    @endslot
</x-table>
