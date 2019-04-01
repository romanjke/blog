@extends('layouts.app')

@section('title')
    {{ $post->title }}
@endsection

@section('content')
    @component('components.post')
        @slot('title')
            <div class="pull-left">{{ $post->user->name }}</div>
            <div class="pull-right">{{ date("F j, Y, H:i", strtotime($post->created_at)) }}</div>
            <div class="clearfix"></div>
        @endslot

        <p>{{ $post->content }}</p>

        @slot('footer')
            <ul class="admin-toolbar pull-right">
                <li class="admin-toolbar__item">
                    <a href="{{ route('posts.edit', ['id' => $post->id]) }}">
                        <i class="fas fa-pencil-alt"></i>
                    </a>
                </li>
                <li class="admin-toolbar__item">
                    {{ Form::postLink(['posts.destroy', $post->id], 'delete', '', ['class' => 'admin-toolbar__delete'], 'fas fa-trash-alt') }}
                </li>
            </ul>
            <div class="clearfix"></div>
        @endslot
    @endcomponent

    <p><strong>Comments</strong></p>
    <hr>
    @auth
        @component('components.panel')
            {{ Form::open(['route' => ['comments.store', $post], 'method' => 'post', 'class' => 'form-horizontal']) }}
                <div class="form-group{{ $errors->has('comment') ? ' has-error' : '' }} form-comment">
                    <div class="col-md-12">
                        {{ Form::textarea('comment', old('comment'), array('class' => 'form-control form-comment__text', 'required' => 'required', 'rows' => '3', 'placeholder' => 'Your comment')) }}

                        @if ($errors->has('comment'))
                            <span class="help-block">
                                <strong>{{ $errors->first('comment') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="pull-right">
                    {{ Form::submit('Add Your Comment', ['class' => 'btn btn-success']) }}
                </div>
            {{ Form::close() }}
        @endcomponent
    @endauth

    @component('components.panel')
        @foreach($comments as $comment)
            @component('components.comment')
                @slot('title')
                    <div class="pull-left">{{ $comment->user->name }}</div>
                    <div class="pull-right">{{ date("F j, Y, H:i", strtotime($comment->created_at)) }}</div>
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