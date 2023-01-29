@extends('layouts.base')
@section('base_header_css')

    {{-- <link rel="stylesheet" href="https://rsms.me/inter/inter.css"> --}}
    {{-- <link href="https://afeld.github.io/emoji-css/emoji.css" rel="stylesheet"> --}}
    <link href="/third-party/themify-icons/themify-icons.css" rel="stylesheet">
    <script defer src="https://unpkg.com/@alpinejs/collapse@3.x.x/dist/cdn.min.js"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

    @stack('header_css')

@endsection
@section('base_header_js')

    <script src="https://kit.fontawesome.com/7c2aa8bb6e.js" crossorigin="anonymous"></script>

    @stack('header_js')

@endsection
@push('body_class', ' bg-gray-500 font-sans leading-normal tracking-normal')
@section('base_body')

    <header>
        <x-navbar>
            @slot('title')

                @yield('navbar_title')
                @sectionMissing('navbar_title')
                    {{-- <span class="text-gray-400 mr-1">How laws are made in</span> your state --}}
                    <a href="/">WatchLaws.org</a>
                @endif

            @endslot
            @slot('links')

                {{-- <x-navbar.link href="/">

                    U.S. States

                </x-navbar.link> --}}

            @endslot
        </x-navbar>
    </header>
    <div class="bg-white">

        @stack('body')

    </div>
    <footer class="py-10">
    </footer>

@endsection
