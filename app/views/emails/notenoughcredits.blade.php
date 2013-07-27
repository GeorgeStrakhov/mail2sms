@extends('layouts.email')

@section('title')
	Ooops, looks like you've run out of mail2sms credits.
@stop

@section('content')
	<p>We couldn't get your message sent out, because you don't have enought credits.</p>
	<p>Please buy more credits and try again.</p>
	<div>
		<a class="buyMoreButton" href="http://mail2sms.co/getmore?email={{$userEmail}}">BUY MORE CREDITS</a>
	</div>
@stop