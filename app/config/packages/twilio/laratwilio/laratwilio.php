<?php

return array(

	"accountSid" => isset($_SERVER['TWILIO_ACCOUNT_SID']) ? $_SERVER['TWILIO_ACCOUNT_SID'] : "ACXXXXXX", // Your Twilio account sid
	"authToken" => isset($_SERVER['TWILIO_AUTH_TOKEN']) ? $_SERVER['TWILIO_AUTH_TOKEN'] : "YYYYYY", // Your Twilio auth token
	"fromNumber" => isset($_SERVER['TWILIO_FROM_NUMBER']) ? $_SERVER['TWILIO_FROM_NUMBER'] : "+123456789" //Your Default from number - for sending SMS messages out - must be a registered and sms-capable Twilio number
);