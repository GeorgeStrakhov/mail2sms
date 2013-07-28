<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>mail2sms - send long emails to phones</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="/css/bootstrap.css" type="text/css">
	<link rel="stylesheet" href="/css/bootstrap-responsive.css" type="text/css">
	<link rel="stylesheet" href="/css/pad.min.css" type="text/css">       
	<link rel="icon" type="image/x-png" href="/img/favicon.png" />
</head>
<body>
	<section class="hero">
		<div class="container">
			<article class="marketing row">              
				<div class="offset2 span8">
					<h1 class="headline">
						Send long emails to phones
					</h1>                                    
					<h4 style="font-weight: 300;">Sometimes you need to send something longer than 160 chars, but get it delivered instantly and with a ring. That's where mail2sms comes handy. Simply send an email to phonenumber@mail2sms.co and we will send a text message to this number with a secret link to the content of your message.</h4>
					<p class="call-to-action">
						<a href="#tryItModal" class="btn btn-large btn-green rounded tryNowButton" data-toggle="modal">Try Now</a>
					</p>            
				</div>
			</article>
		</div>
	</section>    
	<section class="block">
		<div class="container">
			<div class="row">
				<div class="offset2 span8">
					<h4 class="headline">Emails, delivered straight away with a ring that one can't miss</h4>
					<p class="headline-caption">
						Some smartphone owners don't check their emails for hours or days. Grabiing their attention is hard. They may be in a meeting or busy, or lazy. But if their phone is on - you can get them: sms is nearly impossible to miss. So next time you are writing an important email that you <strong>really</strong> want the recepient to read straight away - put their phone number on CC (like this: phonenumber@mail2sms.co) and they will get instantly notified. Bingo!
					</p>
					<img src="/img/iphone-placeholder.png" id="hide-image" class="highlight" alt="placeholder" />
				</div>
			</div>
		</div>
	</section>
	<footer>
		<div class="container">
			<a class="brand" href="#">
				&copy; 2013 mail2sms.co
			</a>&nbsp;
			<p class="pull-right">
				<span>Letterboxes photo courtesy <a href="http://www.flickr.com/photos/allansiew/">snap, snap</a></span>
			</p>
		</div>
	</footer>
	<!-- modals -->
	<div id="tryItModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="tryItModalLabel" aria-hidden="true">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			<h3 id="tryItModalLabel" style="font-weight: 300;">Try mail2sms right now</h3>
		</div>
		<div class="modal-body">
			<p>What's your phone number?</p>
			<input type="text" id="mobileNumber" value="+{{$countryCode}}" class="input-block-level" />
			<small class="muted">Please make sure to put the correct country code in. Please refer to <a href="/phonenumberguide">phone number guide</a>.</small><br />
			<small class="muted">By using this you agree to to our <a href="/tos">terms of service</a>.</small>
		</div>
		<div class="modal-footer" style="text-align: center">
			<a href="mailto:{{$countryCode}}@mail2sms.co?subject=Hello+SMS&body=write+your+long+text+here" id="activateEmail" target="_blank" class="btn btn-primary">send mail2sms</a>
		</div>
	</div>
	<!-- scripts -->
	<script src="/js/jquery-1.9.1.min.js"></script>
	<script src="/js/bootstrap.min.js"></script>
	<script src="/js/mail2sms.js"></script>
</body>
</html>