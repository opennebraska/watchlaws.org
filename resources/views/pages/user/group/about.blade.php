@extends('layouts.user-header-and-footer')
@section('html_title', 'About '.$group->name)
@push('body')
    <x-container>

        {{-- Navigation --}}
        <ul class="mb-5">
            <li><a href="{{ route('group.show', $group) }}" class="underline">{{ $group->name }}</a></li>
            <li>About</li>
        </ul>

        <h1 class="mb-3 font-bold text-lg">{{ $group->name }}</h1>

        {{-- Display members --}}
        <h2 class="text-xl mb-5">Members</h2>

        <x-table class="table-auto w-auto">
            @slot('header')
                <x-table.header class="text-left">
                    First
                </x-table.header>
                <x-table.header class="text-left">
                    Last
                </x-table.header>
                <x-table.header class="text-left">
                    Email
                </x-table.header>
                <x-table.header class="text-left">
                    Phone
                </x-table.header>
                <x-table.header class="text-left">
                    Role
                </x-table.header>
            @endslot
            @slot('body')
                @foreach ($group->participants as $user)
                    <x-table.row>
                        <x-table.cell>
                            {{ $user->first_name }}
                        </x-table.cell>
                        <x-table.cell>
                            {{ $user->last_name }}
                        </x-table.cell>
                        <x-table.cell>
                            <a href="mailto:{{ $user->email }}" class="underline">{{ $user->email }}</a>
                        </x-table.cell>
                        <x-table.cell>
                            {{ $user->phone }}
                        </x-table.cell>
                        <x-table.cell>
                            {{ $group->getRole($user) }}
                        </x-table.cell>
                    </x-table.row>
                @endforeach
            @endslot
        </x-table>

    </x-container>
@endpush