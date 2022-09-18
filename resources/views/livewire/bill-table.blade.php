<div>
    <div class="pt-3 pb-6">

        <p>There are {{ number_format($bill_count) }} bills.</p>

    </div>
    <div class="mb-2">

        <input type="text" wire:model="search" class="border border-gray-300 px-2 py-1" placeholder="Search..." />

    </div>

    <x-table class="table-auto">
        @slot('header')
            <x-table.header class="text-left px-2 py-2">
                State
            </x-table.header>
            <x-table.header class="text-left px-2 py-2">
                Session
            </x-table.header>
            <x-table.header class="text-left px-2 py-2">
                ID
            </x-table.header>
            <x-table.header class="text-left px-2 py-2">
                Initial
            </x-table.header>
            <x-table.header class="text-left px-2 py-2">
                Latest
            </x-table.header>
            <x-table.header class="text-left px-2 py-2">
                Summary
            </x-table.header>
        @endslot
        @slot('body')
            @forelse ($bills as $bill)
                <x-table.row class="border-b">
                    <x-table.cell class="px-2 py-2 whitespace-nowrap">

                        {{ $bill->state->state_abbr }}

                    </x-table.cell>
                    <x-table.cell class="px-2 py-2 whitespace-nowrap">

                        @if ($bill->session->year_start == $bill->session->year_end)
                            {{ $bill->session->year_start }}
                        @else
                            {{ $bill->session->year_start }}-{{ $bill->session->year_end }}
                        @endif


                    </x-table.cell>
                    <x-table.cell class="px-2 py-2 whitespace-nowrap">

                        {{ $bill->bill_number }}
                        {{-- ({{ $bill->bill_id }}) --}}

                    </x-table.cell>
                    <x-table.cell class="px-2 py-2 whitespace-nowrap">

                        <span class="group relative">
                            <span class="cursor-pointer border-b border-dashed border-gray-400">
                                {{ $bill->history_items()->first()->history_date }}
                            </span>
                            <span class="hidden group-hover:block absolute z-10 top-6 left-0 border border-gray-400 rounded-sm bg-gray-200 px-1">
                                {{ $bill->history_items()->first()->history_action }}
                            </span>
                        </span>

                    </x-table.cell>
                    <x-table.cell class="px-2 py-2 whitespace-nowrap">

                        {{ $bill->status_date }}

                    </x-table.cell>
                    <x-table.cell class="px-2 py-2">

                            @if ($bill->title != $bill->description)
                                <div class="text-black font-semibold">
                                    {{ $bill->title }}
                                </div>
                            @endif

                            <div class="text-gray-500">
                                {{ $bill->description }}
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
