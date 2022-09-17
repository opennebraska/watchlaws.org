@extends('layouts.base')
@section('base_header_css')

    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    @stack('header_css')

@endsection
@section('base_body')

    @stack('body')

@endsection
