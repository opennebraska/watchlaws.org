@extends('layouts.header-and-footer')
@push('body')
    <x-container>

        <h1 class="font-bold text-gray-400 pb-3">Login</h1>

        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div class="pb-2">

                <input type="text" name="email"
                    class="px-2 py-2 w-80"
                    placeholder="Your email address"
                    />

            </div>
            <div class="pb-2">

                <input type="password" name="password"
                    class="px-2 py-2 w-80"
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
