@extends('layouts.app')

@section('title')
    Edit post
@endsection

@section('content')
    @component('components.panel')
        {{ Form::open(['route' => ['posts.update', $post], 'method' => 'put', 'class' => 'form-horizontal']) }}
            {{ Form::bsText('title', 'Title', $post->title, ['required' => 'required']) }}
            {{ Form::bsTextArea('content', 'Content', $post->content, ['required' => 'required']) }}
            <hr>
            <div class="row">
                <div class="col-md-10 col-md-offset-2">
                    {{ Form::submit('Save', ['class' => 'btn btn-success']) }}
                </div>
            </div>
        {{ Form::close() }}
    @endcomponent
@endsection