@component('mail::message')
# PROGRESS NOTIFICATION

**{{ $history->bill->number }}** - {{ $history->bill->title }}

@component('mail::panel')
{{ $history->action }}

{{ $history->nebraska_hearing_date_humanized }}
@endcomponent

You are being notified because you belong to the following groups that have bookmarked this bill:

@foreach ($relatedGroups as $group)
@component('mail::button', ['url' => route('groups.show', $group)])
{{ $group->name }}
@endcomponent
@endforeach
@endcomponent
