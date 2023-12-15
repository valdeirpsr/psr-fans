@extends('layouts.app')

@section('main')
    @livewire('navigation-menu')

    @yield('content')
    <x-comment-dialog />
    <x-media-viewer />
    @livewire('subscribe-modal'))
    <x-gift-modal />
@endsection
