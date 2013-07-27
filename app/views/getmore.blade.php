@extends('layouts.basic')

@section('heading')
    <h1 style="text-align: center;">Buy more mail2sms credits</h1>
@stop

@section('content')
<div class="well" style="text-align:center">
	<h3>What email should we top up?</h3>
	<input type="text" class="input input-large" id="newUserEmail" value="{{$userEmail}}" />
	<br /><br />
	<p><small class="muted">NB! You will only be able to send more messages from this email.</small></p>
	<form class="form" action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
		<input type="hidden" name="custom" id="userEmail" value="{{$userEmail}}">
		<input type="hidden" name="cmd" value="_s-xclick">
		<input type="hidden" name="hosted_button_id" value="BE7MJCAQ7KUAN">
		<table style="text-align: center; width: 80%; margin: 0 auto; margin-bottom: 10px;">
			<tr><td><input type="hidden" name="on0" value="How many messages?"><h3>How many messages do you need?</h3></td></tr><tr><td>
		<select name="os0">
			<option value="10 messages">10 messages $1.00 USD</option>
			<option value="100 messages" selected>100 messages $5.00 USD</option>
			<option value="300 messages">300 messages $10.00 USD</option>
		</select> </td></tr>
		</table>
		<br />
		<input type="hidden" name="currency_code" value="USD">
		<!-- <input type="image" src="https://www.paypalobjects.com/en_GB/HK/i/btn/btn_buynowCC_LG_wCUP.gif" border="0" name="submit" alt="PayPal – The safer, easier way to pay online."> -->
		<button type="button" id="buyMoreButton" class="btn btn-large btn-green rounded">Buy</button>
		<img alt="" border="0" src="https://www.paypalobjects.com/en_GB/i/scr/pixel.gif" width="1" height="1">
	</form>
</div>
<p style="text-align: center;" class="muted">
	Thank you for supporting <a href="http://mail2sms.co">mail2sms.co</a>.
</p>
@stop