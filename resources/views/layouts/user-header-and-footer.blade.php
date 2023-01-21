@extends('layouts.header-and-footer')
@prepend('body')

    <form id="logout" action="{{ route('logout') }}" method="POST">@csrf</form>

    <div class="px-6 pt-1 text-slate-600">

        <a href="{{ route('dashboard') }}"
            class="underline"
            >Home</a>

        <span class="mx-1">|</span>

        {{ auth()->user()->full_name }}

        <span class="text-slate-400">
            (<button form="logout" type="submit" class="underline">logout</button>)
        </span>

    </div>

@endprepend
