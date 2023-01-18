@extends('layouts.header-and-footer')
@section('html_title', 'Login')
@push('body')
    <x-container>

        <h1 class="font-bold text-gray-500 pb-3">Login</h1>

        @if ($errors->any())
            <div class="mb-4 px-3 py-3 w-80 bg-pink-200 text-red-800 text-sm">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li class="ml-4 mb-2 last:mb-0 list-disc">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div class="pb-2">

                <input type="text" name="email"
                    class="px-2 py-2 w-80 border border-slate-300"
                    placeholder="Your email address"
                    />

            </div>
            <div class="pb-2">

                <input type="password" name="password"
                    class="px-2 py-2 w-80 border border-slate-300"
                    placeholder="Password for this site"
                    />

            </div>
            <div class="pb-2">

                <label>
                    <input type="checkbox" name="remember" /> remember login
                </label>

            </div>
            <div>

                <button type="submit"
                    class="bg-slate-300 hover:bg-slate-400 px-4 py-1 rounded-sm"
                    >Login</button>

            </div>
        </form>

    </x-container>
@endpush
