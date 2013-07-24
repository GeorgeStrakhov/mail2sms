@extends('layouts.scaffold')

@section('main')

<h1>Create Message</h1>

{{ Form::open(array('route' => 'messages.store')) }}
    <ul>
        <li>
            {{ Form::label('raw_msg', 'Raw_msg:') }}
            {{ Form::textarea('raw_msg') }}
        </li>

        <li>
            {{ Form::label('headers', 'Headers:') }}
            {{ Form::textarea('headers') }}
        </li>

        <li>
            {{ Form::label('html', 'Html:') }}
            {{ Form::textarea('html') }}
        </li>

        <li>
            {{ Form::label('text', 'Text:') }}
            {{ Form::textarea('text') }}
        </li>

        <li>
            {{ Form::label('subject', 'Subject:') }}
            {{ Form::text('subject') }}
        </li>

        <li>
            {{ Form::label('to', 'To:') }}
            {{ Form::text('to') }}
        </li>

        <li>
            {{ Form::label('from_email', 'From_email:') }}
            {{ Form::text('from_email') }}
        </li>

        <li>
            {{ Form::label('from_name', 'From_name:') }}
            {{ Form::text('from_name') }}
        </li>

        <li>
            {{ Form::submit('Submit', array('class' => 'btn')) }}
        </li>
    </ul>
{{ Form::close() }}

@if ($errors->any())
    <ul>
        {{ implode('', $errors->all('<li class="error">:message</li>')) }}
    </ul>
@endif

@stop


