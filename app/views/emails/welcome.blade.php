@extends('layouts.email')

@section('title')
	Welcome to <a href="http://mail2sms.co">MAIL2SMS!</a>
@stop

@section('content')
	<p>You can now send <strong>{{$remainingCredits}}</strong> emails that we will deliver right to the phone of the recepient via sms - something nobody can miss or ignore.</p>
	<p>
	@include('partials._upsell')
@stop