@extends('layouts.app')

@section('title')
    {{ $post->title }}
@endsection

@section('content')
    @component('components.post', ['post' => $post])
        @slot('title')
            <div class="pull-left">{{ $post->user->name }}</div>
            <div class="pull-right">{{ $post->created_at->format('d/m/Y, H:i') }}</div>
            <div class="clearfix"></div>
        @endslot

        <p>{{ $post->content }}</p>

        @slot('footer')
            <ul class="admin-toolbar pull-right">
                <li class="admin-toolbar__item">
                    <a href="{{ route('posts.edit', ['post' => $post]) }}">
                        <i class="fas fa-pencil-alt"></i>
                    </a>
                </li>
                <li class="admin-toolbar__item">
                    {{ Form::postLink(['posts.destroy', $post], 'delete', '', ['class' => 'admin-toolbar__delete'], 'fas fa-trash-alt') }}
                </li>
            </ul>
            <div class="clearfix"></div>
        @endslot
    @endcomponent

    <p><strong>@lang('comments.comments')</strong></p>
    <hr>
    @can('create', App\Comment::class)
        @component('components.panel')
            {{ Form::open(['route' => ['comments.store', $post], 'method' => 'post', 'class' => 'form-horizontal']) }}
                <div class="form-group{{ $errors->has('comment') ? ' has-error' : '' }} form-comment">
                    <div class="col-md-12">
                        {{ Form::textarea('comment', old('comment'), array('class' => 'form-control form-comment__text', 'required' => 'required', 'rows' => '3', 'placeholder' => trans('comments.placeholder'))) }}

                        @if ($errors->has('comment'))
                            <span class="help-block">
                                <strong>{{ $errors->first('comment') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="pull-right">
                    {{ Form::submit(trans('comments.add'), ['class' => 'btn btn-success']) }}
                </div>
            {{ Form::close() }}
        @endcomponent
    @endcan

    @component('components.panel')
        @foreach($comments as $comment)
            @component('components.comment', ['comment' => $comment])
                @slot('title')
                    <div class="pull-left">{{ $comment->user->name }}</div>
                    <div class="pull-right">{{ $post->created_at->format('d/m/Y, H:i') }}</div>
                    <div class="clearfix"></div>
                @endslot

                <p>{{ $comment->comment }}</p>

                @slot('footer')
                    <ul class="admin-toolbar pull-right">
                        <li class="admin-toolbar__item">
                            <a href="{{ route('comments.edit', ['comment' => $comment]) }}">
                                <i class="fas fa-pencil-alt"></i>
                            </a>
                        </li>
                        <li class="admin-toolbar__item">
                            {{ Form::postLink(['comments.destroy', $comment], 'delete', '', ['class' => 'admin-toolbar__delete'], 'fas fa-trash-alt') }}
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                @endslot
            @endcomponent
        @endforeach
    @endcomponent
@endsection