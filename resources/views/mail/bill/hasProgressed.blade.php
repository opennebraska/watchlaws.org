@component('mail::message')
# PROGRESS NOTIFICATION

**{{ $billHistory->bill->number }}** - {{ $billHistory->bill->title }}

@component('mail::panel')
{{ $billHistory->action }}

{{ $billHistory->nebraska_hearing_date_humanized }}
@endcomponent

You are being notified because you belong to the following groups that have bookmarked this bill:

@foreach ($related_groups as $group)
@component('mail::button', ['url' => route('groups.show', $group)])
{{ $group->name }}
@endcomponent
@endforeach
@endcomponent
