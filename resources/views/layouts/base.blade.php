<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('html_title') - WatchLaws.org</title>
        @yield('base_header_top')
        @yield('base_header_css')
        @yield('base_header_js')
        @yield('base_header_bottom')
        @vite('resources/css/app.css')
        @livewireStyles
    </head>
    <body class="@stack('body_class')">
        @yield('base_body_top')
        @yield('base_body')
        @yield('base_body_bottom')
        @livewireScripts
    </body>
</html>
