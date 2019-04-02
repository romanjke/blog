@extends('layouts.app')

@section('title')
    @lang('posts.edit')
@endsection

@section('content')
    @component('components.panel')
        {{ Form::open(['route' => ['posts.update', $post], 'method' => 'put', 'class' => 'form-horizontal']) }}
            {{ Form::bsText('title', trans('posts.fields.title'), $post->title, ['required' => 'required']) }}
            {{ Form::bsTextArea('content', trans('posts.fields.content'), $post->content, ['required' => 'required']) }}
            <hr>
            <div class="row">
                <div class="col-md-10 col-md-offset-2">
                    {{ Form::submit(trans('app.save'), ['class' => 'btn btn-success']) }}
                </div>
            </div>
        {{ Form::close() }}
    @endcomponent
@endsection