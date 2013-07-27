@extends('layouts.email')

@section('title')
	Thanks for topping up your <a href="http://mail2sms.co">MAIL2SMS!</a> balance.
@stop

@section('content')
	<p>You can now send <strong>{{$remainingCredits}}</strong> emails that we will deliver right to the phone of the recepient via sms - something nobody can miss or ignore.</p>
@stop