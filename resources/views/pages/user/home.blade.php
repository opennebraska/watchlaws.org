@extends('layouts.user-header-and-footer')
{{-- @section('html_title', '') --}}
@push('body')
    <x-container>

        {{-- Display groups --}}
        <h2 class="mb-1 font-semibold text-lg">Groups</h2>
        @foreach ($groups as $group)

            <div class="pb-1">
                <a href="{{ route('group.show', compact('group')) }}"
                    class="underline"
                    >{{ $group->name }}</a>
            </div>

        @endforeach

    </x-container>
@endpush
