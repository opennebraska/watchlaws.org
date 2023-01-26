@php

    $days = $historyItem->nebraska_hearing_date?->diffInDays(now()->startOfDay(), false) ?? null;

@endphp
@if (isset($days))
    @if ($days < 0)

        <x-alert.warning>
            {{ view('partials.hearings.alert.contents')->withHistoryItem($historyItem) }}
        </x-alert.warning>

    @elseif ($days == 0)

        <x-alert.danger>
            {{ view('partials.hearings.alert.contents')->withHistoryItem($historyItem) }}
        </x-alert.danger>

    @else

        <x-alert.gray>
            {{ view('partials.hearings.alert.contents')->withHistoryItem($historyItem) }}
        </x-alert.gray>

    @endif
@else

    <x-alert.info>
        {{ view('partials.hearings.alert.contents')->withHistoryItem($historyItem) }}
    </x-alert.info>

@endif
