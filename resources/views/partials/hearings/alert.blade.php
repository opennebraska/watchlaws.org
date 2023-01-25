<x-alert>

    <div>
        {{ $historyItem->action }}
    </div>
    @if ($historyItem->nebraska_hearing_date_humanized)
        <div class="text-sm opacity-80 text-black">
            {{ $historyItem->nebraska_hearing_date_humanized }}
        </div>
    @endif
    <div class="text-sm opacity-60 text-right">
        Logged {{ $historyItem->date->format('F j, Y') }}
    </div>

</x-alert>
