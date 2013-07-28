@extends('layouts.basic')

@section('heading')
    <h1 style="text-align: center;">Using phone numbers with mail2sms</h1>
@stop

@section('content')
<div class="well">
	<p>
		If you want to make sure that your messages are delivered via sms to the right people - <strong>it's crucial</strong> to type in the numbers correctly.
	</p>
	<p>
		Here are a few examples on how to do that right:
	</p>
	<ul>
		<li>
			<strong>85294377498@mail2sms.co</strong> - 852 is the international code of Hong Kong and 94377498 is my number.
		</li>
		<li>
			<strong>79032485866@mail2sms.co</strong> - 7 is the country code of Russia, 9032485866 is the phone number
		</li>
	</ul>
	<p>
		Texty, our little sms typing robot performs basic checks, and will send you warning if you try a number that doesn't exists. But it can't always guess right what you mean. Let's say you forget the country code of Hong Kong and just type in 94377498. In that case Texty will think that you are trying to send a message to somebody in Sri Lanka (+94 is the code of Sri Lanka).
	</p>
	<p>
		You can find more information about country codes <a href="http://en.wikipedia.org/wiki/List_of_country_calling_codes">here</a>.
	<p>
		Take care!<br />
		mail2sms.co folks
	</p>

</div>
<p style="text-align: center;" class="muted">
	Thank you for using <a href="http://mail2sms.co">mail2sms.co</a>.
</p>
@stop