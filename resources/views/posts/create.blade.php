@extends('layouts.app')

@section('title')
    Add new post
@endsection

@section('content')
    @component('components.panel')
        {{ Form::open(['route' => ['posts.store'], 'method' => 'post', 'class' => 'form-horizontal']) }}
            {{ Form::bsText('title', 'Title', old('title'), ['required' => 'required']) }}
            {{ Form::bsTextArea('content', 'Content', old('content'), ['required' => 'required']) }}
            <hr>
            <div class="row">
                <div class="col-md-10 col-md-offset-2">
                    {{ Form::submit('Add', ['class' => 'btn btn-success']) }}
                </div>
            </div>
        {{ Form::close() }}
    @endcomponent
@endsection