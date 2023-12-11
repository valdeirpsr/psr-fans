@extends('layouts.app')

@section('main')
    @yield('content')
    <x-comment-dialog />
    <x-media-viewer />
    <x-subscribe-modal />
    <x-gift-modal />
@endsection
