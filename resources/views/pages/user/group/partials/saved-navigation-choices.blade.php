<div class="grid grid-cols-2 ">

    <div class="bg-gray-200 px-4 py-4">

        <span class="text-xl">
            {{ $group->chosenYear() }}
        </span>
        <a href="" class="underline">change</a>

    </div>
    <div class="bg-gray-200 px-4 py-4">

        @if ($group->chosenState())

            <span class="text-xl">
                {{ config('enum.legiscan_states')[$group->chosenState()] }}
            </span>
            <a href="" class="underline">change</a>

        @else

        <a href="" class="underline">pick state</a>

        @endif

    </div>

</div>
