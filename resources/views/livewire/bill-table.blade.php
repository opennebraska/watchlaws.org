<div>

    <div class="mb-2 flex">
        <div class="flex-grow">

            <input type="text" wire:model="search" class="border border-gray-300 px-2 py-1" placeholder="Search..." />

        </div>
        @if ($has_filters)
            <div>

                <a wire:click.prevent="resetFilters" href="#" class="hover:underline text-gray-400">Reset filters</a>

            </div>
        @endif
    </div>

    <x-table class="table-auto">
        @slot('header')
            <x-table.header class="text-left">
                Bill
            </x-table.header>
            <x-table.header>
                Source
            </x-table.header>
            <x-table.header class="text-left">
                Summary
            </x-table.header>
            <x-table.header class="text-left">
                Status
            </x-table.header>
            <x-table.header class="text-left">
                Latest
            </x-table.header>
        @endslot
        @slot('body')
            @forelse ($bills as $bill)
                <x-table.row class="border-b">
                    <x-table.cell class="whitespace-nowrap">

                        {{-- Bill --}}
                        {{ $bill->bill_number }}

                    </x-table.cell>
                    <x-table.cell class="text-center whitespace-nowrap">

                        <a href="{{ $bill->state_url }}" class="text-gray-400 hover:text-gray-500">
                            <i class="fa-solid fa-landmark hover:underline underline-offset-4 mr-1"></i>
                        </a>

                        <a href="{{ $bill->legiscan_url }}" class="text-gray-400 hover:text-gray-500">
                            <i class="fa-solid fa-book hover:underline underline-offset-4"></i>
                        </a>

                    </x-table.cell>
                    <x-table.cell>

                        {{-- Summary --}}
                        <div class="max-h-32 line-clamp-5">

                            @if ($bill->title != $bill->description)
                                <div class="text-black font-semibold">
                                    {{ $bill->title }}
                                </div>
                            @endif

                            <div class="text-gray-500">
                                {{ $bill->description }}
                            </div>

                        </div>

                    </x-table.cell>
                    <x-table.cell class="whitespace-nowrap">

                        {{-- Status --}}
                        {{ $bill->status->progress_desc }}

                    </x-table.cell>
                    <x-table.cell class="whitespace-nowrap">

                        {{-- Latest --}}
                        <span class="group relative">
                            <span class="cursor-pointer border-b border-dashed border-gray-400">
                                {{ $bill->history_items()->orderByDesc('history_date')->first()->history_date }}
                            </span>
                            <span class="hidden group-hover:block absolute z-10 top-6 right-0 border border-gray-400 rounded-sm bg-gray-200 px-1">
                                {{ $bill->history_items()->orderByDesc('history_date')->first()->history_action }}
                            </span>
                        </span>

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
