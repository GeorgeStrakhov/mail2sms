@extends('layouts.email')

@section('title')
	Congratualtions, your message was sent to +{{$toNumber}}
@stop

@section('content')
	<p>Here is the link that we sent to +{{$toNumber}}:</p>
	<p class="quote"><a href="http://mail2sms.co/m/{{$newMessageSlug}}">http://mail2sms.co/m/{{$newMessageSlug}}</a></p>
	<p>You can send {{$remainingCredits}} more messages before you run out of credits.</p>
	@include('partials._upsell')
@stop