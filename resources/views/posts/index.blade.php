@extends('layouts.app')

@section('title')
    Posts
@endsection

@section('content')
    @component('components.panel')
        <div class='pull-right'>
            <a href='/admin/posts/create'>
                <div class="btn btn-success">Add new post</div>
            </a>
        </div>
        <table class='table'>
            <thead>
                <tr>
                    <th>Title</th>
                    <th>View post</th>
                    <th>Edit post</th>
                    <th>Delete post</th>
                </tr>
            </thead>
            <tbody>
                @foreach($posts as $post)
                <tr>
                    <td>{{ $post->title }}</td>
                    <td>
                        <a href="{{ route('posts.show', ['id' => $post->id]) }}" class='btn btn-default'>View post</a>
                    </td>
                    <td>
                        <a href="{{ route('posts.edit', ['id' => $post->id]) }}" class='btn btn-primary'>Edit post</a>
                    </td>
                    <td>
                        {{ Form::postLink(['posts.destroy', $post->id], 'delete', 'Delete post', ['class' => 'btn btn-danger']) }}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $posts->links() }}
    @endcomponent
@endsection