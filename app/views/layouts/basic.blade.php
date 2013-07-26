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
	<section class="block" style="border-bottom: none;">
		<div class="container">
			<div class="row">
				<div class="offset2 span8">
					@yield('heading')
					<hr />
					<div style="margin-left:3px;">
						@yield('content')
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- scripts -->
	<script src="/js/jquery-1.9.1.min.js"></script>
	<script src="/js/bootstrap.min.js"></script>
	<script src="/js/mail2sms.js"></script>
</body>
</html>