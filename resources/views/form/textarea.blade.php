<div class="form-group{{ $errors->has($field) ? ' has-error' : '' }}">
    {{ Form::label($field, $field_name, ['class' => 'col-md-2 control-label']) }}

    <div class="col-md-10">
        {{ Form::textarea($field, $field_value, array_merge(['class' => 'form-control'], $attributes)) }}

        @if ($errors->has($field))
            <span class="help-block">
                <strong>{{ $errors->first($field) }}</strong>
            </span>
        @endif
    </div>
</div>