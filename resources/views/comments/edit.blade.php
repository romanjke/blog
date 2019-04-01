@extends('layouts.app')

@section('title')
    Edit comment
@endsection

@section('content')
    @component('components.panel')
        {{ Form::open(['route' => ['comments.update', $comment], 'method' => 'put', 'class' => 'form-horizontal']) }}
            <div class="form-group{{ $errors->has('comment') ? ' has-error' : '' }} form-comment">
                <div class="col-md-12">
                    {{ Form::textarea('comment', $comment->comment, array('class' => 'form-control form-comment__text', 'required' => 'required', 'rows' => '3', 'placeholder' => 'Your comment')) }}

                    @if ($errors->has('comment'))
                        <span class="help-block">
                            <strong>{{ $errors->first('comment') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="pull-right">
                {{ Form::submit('Save', ['class' => 'btn btn-success']) }}
            </div>
        {{ Form::close() }}
    @endcomponent
@endsection