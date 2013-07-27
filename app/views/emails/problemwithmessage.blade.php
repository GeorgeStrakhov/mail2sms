@extends('layouts.email')

@section('title')
	Ooops... There was a problem with your message.
@stop

@section('content')
	<p>Here is what Texty (our little email2sms typing robot) said:</p>
	<p class="quote"><em>"{{$error}}"</em></p>
	<p>If you think Texty made a mistake or you need help, simply reply to this email and we'll see what we can do.</p>
@stop