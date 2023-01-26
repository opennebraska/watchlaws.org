@php

    $bill = $history->bill;

@endphp
@component('mail::message')
# BILL NOTIFICATION

**{{ $bill->number }}** &ndash; {{ $bill->title }}

@component('mail::panel')
**{{ $history->action }}**<br />
{{ $history->nebraska_hearing_date_humanized ?? '' }}

<sup>Logged {{ $history->history_date->format('Y-m-d') }}</sup>
@endcomponent

Sponsors:<br />
@foreach ($bill->sponsors ?? [] as $sponsor)
{{ $sponsor->person?->name }} ({{ $sponsor->person?->party?->name }}) &ndash; {{ $sponsor->type->description }}<br />
@endforeach

@if ($bill->pendingCommittee)
Committee:<br />
{{ $bill->pendingCommittee->name }}
@endif

[{{ $bill->state_url }}]({{ $bill->state_url }})

@if ($bill->title != $bill->description)
{{ $bill->description }}
@endif

<br />

<sup>You are being notified because you belong to the following groups where this bill is bookmarked:</sup>

@foreach ($relatedGroups as $group)
<sup>{{ $group->name }}</sup>

@endforeach
@endcomponent
