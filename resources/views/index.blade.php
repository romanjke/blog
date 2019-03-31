@extends('layouts.app')

@section('title')
    Posts
@endsection

@section('content')
    @component('components.panel')
        <table class='table'>
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach($posts as $post)
                <tr>
                    <td>
                        <a href="{{ route('home.show', ['id' => $post->id]) }}">{{ $post->title }}</a>
                    </td>
                    <td>{{ $post->user->name }}</td>
                    <td>{{ date("F j, Y, H:i", strtotime($post->created_at)) }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $posts->links() }}
    @endcomponent
@endsection