@extends('layouts.app')

@section('title')
    Posts
@endsection

@section('content')
    @component('components.panel')
        <div class='mb-2 pull-right'>
            <a href='/admin/posts/create'>
                <div class="btn btn-success">
                    <i class="fas fa-plus"></i> Add new post
                </div>
            </a>
        </div>
        <table class='table'>
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Date</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach($posts as $post)
                <tr>
                    <td>
                        <a href="{{ route('home.show', ['post' => $post]) }}">{{ $post->title }}</a>
                    </td>
                    <td>{{ $post->user->name }}</td>
                    <td>{{ date("F j, Y, H:i", strtotime($post->created_at)) }}</td>
                    <td>
                        @can('change', $post)
                        <a href="{{ route('posts.edit', ['post' => $post]) }}" class='btn btn-primary'>
                            <i class="fas fa-pencil-alt"></i> <span>Edit</span>
                        </a>
                        @endcan
                    </td>
                    <td>
                        @can('change', $post)
                        {{ Form::postLink(['posts.destroy', $post], 'delete', 'Delete', ['class' => 'btn btn-danger'], 'fas fa-trash-alt') }}
                        @endcan
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $posts->links() }}
    @endcomponent
@endsection