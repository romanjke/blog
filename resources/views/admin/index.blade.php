@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    @component('components.panel')
        @lang('app.logged_in')
    @endcomponent
@endsection
