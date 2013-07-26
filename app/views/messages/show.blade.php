@extends('layouts.basic')

@section('heading')
    <div class="muted" style="margin-left: 3px;">
        <span style="text-decoration: underline;">from</span>:
            {{($message->from_name) ? $message->from_name.', ' : ''}} {{explode('@', $message->from_email)[0]}}&#64;{{explode('@', $message->from_email)[1]}}
    </div>
    <h1>{{$message->subject}}</h1>
@stop

@section('content')
    {{($message->html) ? $message->html : nl2br($message->text)}}
    <div style="text-align: center; margin: 20px;">
        <a href="mailto:{{$message->from_email}}" class="btn btn-large btn-green rounded">reply</a>
    </div>
@stop