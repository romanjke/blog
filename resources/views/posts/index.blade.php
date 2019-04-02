@extends('layouts.app')

@section('title')
    @lang('posts.heading')
@endsection

@section('content')
    @component('components.panel')
        <div class='mb-2 pull-right'>
            <a href='/admin/posts/create'>
                <div class="btn btn-success">
                    <i class="fas fa-plus"></i> @lang('posts.add')
                </div>
            </a>
        </div>
        <table class='table'>
            <thead>
                <tr>
                    <th>@lang('posts.title')</th>
                    <th>@lang('posts.author')</th>
                    <th>@lang('posts.date')</th>
                    <th>@lang('app.edit')</th>
                    <th>@lang('app.delete')</th>
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
                    <td>
                        @can('change', $post)
                        <a href="{{ route('posts.edit', ['post' => $post]) }}" class='btn btn-primary'>
                            <i class="fas fa-pencil-alt"></i> <span>@lang('app.edit')</span>
                        </a>
                        @endcan
                    </td>
                    <td>
                        @can('change', $post)
                        {{ Form::postLink(['posts.destroy', $post], 'delete', trans('app.delete'), ['class' => 'btn btn-danger'], 'fas fa-trash-alt') }}
                        @endcan
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $posts->links() }}
    @endcomponent
@endsection