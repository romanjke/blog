@extends('layouts.app')

@section('title')
    {{ $post->title }}
@endsection

@section('content')
    @component('components.panel')
        @slot('title')
            <div class="pull-left">{{ $post->user->name }}</div>
            <div class="pull-right">{{ date("F j, Y, H:i", strtotime($post->created_at)) }}</div>
            <div class="clearfix"></div>
        @endslot

        <p>{{ $post->content }}</p>

    @endcomponent
@endsection