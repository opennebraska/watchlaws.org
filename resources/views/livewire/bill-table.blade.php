<div>

    <div class="mb-2">

        <input type="text" wire:model="search" class="border border-gray-300 px-2 py-1 mr-2" placeholder="Search..." />

        @if ($has_filters)

            <a wire:click.prevent="resetFilters" href="#" class="hover:underline text-gray-400">reset</a>

        @endif

    </div>

    <x-table class="table-auto">
        @slot('header')
            <x-table.header class="text-left text-sm">

            </x-table.header>
            <x-table.header class="text-left text-sm">
                Summary
            </x-table.header>
            <x-table.header class="text-left text-sm">
                Status
            </x-table.header>
        @endslot
        @slot('body')
            @forelse ($bills as $bill)
                @php

                    $is_bookmarked = ($bill->bookmark($scope)->direction ?? null) === true;
                    $is_hidden = ($bill->bookmark($scope)->direction ?? null) === false;

                @endphp
                <x-table.row class="border-b {{ $is_bookmarked ? 'bg-green-100' : '' }} {{ $is_hidden ? 'bg-gray-200' : '' }}">
                    <x-table.cell class="whitespace-nowrap">

                        {{-- Options --}}

                        {{-- <div class="inline-block align-middle text-center">
                            <div class="leading-3">

                                <a wire:click.prevent="voteUp" href="#" class="text-slate-400">
                                    <i class="fa-solid fa-chevron-up"></i>
                                </a>

                            </div>
                            <div>
                                0
                            </div>
                            <div class="leading-3">

                                <a wire:click.prevent="voteDown" href="#" class="text-slate-400">
                                    <i class="fa-solid fa-chevron-down"></i>
                                </a>

                            </div>
                        </div> --}}

                        <a wire:click.prevent="toggleBookmark({{ $bill }})" href="#">

                            @if (($bill->bookmark($scope)->direction ?? null) === true)
                                <i class="fa-solid fa-bookmark text-green-700"></i>
                            @else
                                <i class="fa-regular fa-bookmark text-slate-400"></i>
                            @endif

                        </a>

                        <a wire:click.prevent="toggleHide({{ $bill }})" href="#" class="ml-2">

                            @if (($bill->bookmark($scope)->direction ?? null) === false)
                                <i class="fa-solid fa-circle-minus text-gray-400"></i>
                            @else
                                <i class="fa-solid fa-circle-minus text-slate-400"></i>
                            @endif

                        </a>

                        {{-- <a href="{{ $bill->state_url }}" class="text-gray-400 hover:text-gray-500">
                            <i class="fa-solid fa-landmark hover:underline underline-offset-4 mr-1"></i>
                        </a>

                        <a href="{{ $bill->legiscan_url }}" class="text-gray-400 hover:text-gray-500">
                            <i class="fa-solid fa-book hover:underline underline-offset-4"></i>
                        </a> --}}

                    </x-table.cell>
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

    <div class="mt-4 flex">

        <div class="px-3">

            Page size:

            <select wire:model="pageSize" class="border border-gray-300 h-9 rounded-md px-2">
                <option>5</option>
                <option>50</option>
                <option>500</option>
            </select>

        </div>

        @if($bills->links())
            <div class="flex-grow">
                {{ $bills->links() }}
            </div>
        @endif

    </div>

</div>
