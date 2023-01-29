<div>

    <div class="mb-2">

        <input type="text" wire:model="search" class="border border-gray-300 px-2 py-1 mr-2 w-80" placeholder="Search..." />

        @if ($this->hasFilters())

            <a wire:click.prevent="resetFilters" href="#" class="hover:underline text-gray-400">reset</a>

        @endif

    </div>

    <x-table class="table-auto">
        @slot('header')
            <x-table.header>

            </x-table.header>
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
            @forelse ($bills as $bill)
                @php

                    $bookmarkToggle = app(\App\Helpers\BookmarkToggle::class);

                    $bookmark = $bookmarkToggle->getBookmark($bill, $scope);
                    $isBookmarked = ($bookmark->direction ?? null) === true;
                    $isHidden = ($bookmark->direction ?? null) === false;

                @endphp
                <x-table.row class="border-b {{ $isBookmarked ? 'bg-green-100' : '' }} {{ $isHidden ? 'bg-gray-200' : '' }}">
                    <x-table.cell class="whitespace-nowrap text-center">

                        {{-- State seal --}}
                        @if (\File::exists(public_path('/media/us_states/seals/'.$bill->state->abbreviation.'.svg')))
                            <img src="/media/us_states/seals/{{ $bill->state->abbreviation }}.svg" alt="" class="h-12 max-w-none inline-block" />
                        @endif
                        <div class="leading-none">
                            <span class="text-xs text-gray-400">{{ $bill->state->abbreviation }}</span>
                        </div>

                    </x-table.cell>
                    <x-table.cell class="whitespace-nowrap">

                        {{-- Options --}}

                        <a wire:click.prevent="toggleBookmark({{ $bill }})" href="#">

                            @if ($isBookmarked)
                                <i class="fa-solid fa-bookmark text-green-700"></i>
                            @else
                                <i class="fa-regular fa-bookmark text-slate-400"></i>
                            @endif

                        </a>

                        <a wire:click.prevent="toggleHide({{ $bill }})" href="#" class="ml-2">

                            @if ($isHidden)
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
                    <x-table.cell class="whitespace-nowrap">

                        <div class="text-sm text-gray-700">

                            {{-- Latest --}}
                            <div>
                                {{ $bill->history()->orderByDesc('history_date')->first()->history_date ?? '' }}
                            </div>

                            {{-- Action --}}
                            <div class="truncate max-w-xs">
                                {{ $bill->history()->orderByDesc('history_date')->first()->history_action ?? '' }}
                            </div>

                            {{-- Status --}}
                            <div>
                                {{ $bill->status->progress_desc ?? '' }}
                            </div>

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
