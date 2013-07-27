<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title')</title>
        <style>
			body {padding: 10px; font-family: Arial;}
			hr {border-bottom: 1px solid #ddd;}
			.muted {color: #999;}
			.small {font-size: 80%;}
			.quote {padding-left: 20px; color: #444;}
			.buyMoreButton {display: inline-block; background-color: #62c462; color: #fff; text-decoration: none; padding: 10px; border: 1px solid #777; font-weight: 700; border-radius: 10px;}
        </style>
    </head>
    <body>
    	<h3>@yield('title')</h3>
        @yield('content')
		<p>
			Take care,<br />
			<a href="http://mail2sms.co">mail2sms</a>
		</p>
        <hr />
        <p class="small muted">
			Any trouble? Just reply to this email and we will try to sort it all out.
        </p>
    </body>
</html>