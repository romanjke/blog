@extends('layouts.app')

@section('title')
    @lang('posts.heading')
@endsection

@section('content')
    @component('components.panel')
        <table class='table'>
            <thead>
                <tr>
                    <th>@lang('posts.title')</th>
                    <th>@lang('posts.author')</th>
                    <th>@lang('posts.date')</th>
                </tr>
            </thead>
            <tbody>
                @foreach($posts as $post)
                <tr>
                    <td>
                        <a href="{{ route('home.show', ['post' => $post]) }}">{{ $post->title }}</a>
                    </td>
                    <td>{{ $post->user->name }}</td>
                    <td>{{ $post->created_at->format('d/m/Y, H:i') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $posts->links() }}
    @endcomponent
@endsection