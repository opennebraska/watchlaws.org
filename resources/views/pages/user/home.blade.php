@extends('layouts.user-header-and-footer')
@section('html_title', 'User home')
@push('body')
    <x-container>

        <h1 class="mb-4 font-bold text-lg">{{ auth()->user()->full_name }}</h1>

        {{-- Display groups --}}
        <h2 class="mb-1 font-semibold">Groups</h2>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-y-1">
            @foreach ($groups as $group)

                <div>
                    <a href="{{ route('group.show', compact('group')) }}"
                        class="underline"
                        >{{ $group->name }}</a>
                </div>

            @endforeach
        </div>

    </x-container>
@endpush
