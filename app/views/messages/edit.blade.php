@extends('layouts.scaffold')

@section('main')

<h1>Edit Message</h1>
{{ Form::model($message, array('method' => 'PATCH', 'route' => array('messages.update', $message->id))) }}
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
            {{ Form::submit('Update', array('class' => 'btn btn-info')) }}
            {{ link_to_route('messages.show', 'Cancel', $message->id, array('class' => 'btn')) }}
        </li>
    </ul>
{{ Form::close() }}

@if ($errors->any())
    <ul>
        {{ implode('', $errors->all('<li class="error">:message</li>')) }}
    </ul>
@endif

@stop