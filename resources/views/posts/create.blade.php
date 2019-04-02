@extends('layouts.app')

@section('title')
    @lang('posts.add')
@endsection

@section('content')
    @component('components.panel')
        {{ Form::open(['route' => ['posts.store'], 'method' => 'post', 'class' => 'form-horizontal']) }}
            {{ Form::bsText('title', trans('posts.fields.title'), old('title'), ['required' => 'required']) }}
            {{ Form::bsTextArea('content', trans('posts.fields.content'), old('content'), ['required' => 'required']) }}
            <hr>
            <div class="row">
                <div class="col-md-10 col-md-offset-2">
                    {{ Form::submit(trans('app.add'), ['class' => 'btn btn-success']) }}
                </div>
            </div>
        {{ Form::close() }}
    @endcomponent
@endsection