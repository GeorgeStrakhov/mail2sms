# mail2sms

_send an email to (number)@mail2sms.com and we will send the subject and a super secret link to read the whole thing to that number_

## Todo
### Before Shipping:
* create users table & controller
* inbound email processing: make email controller do the job
* superadmin interface - for adding balance to people etc.
* paypal:
	- figure out how to pass additional data to the paypal button and then to the IPN (so that email identifier of the account can be passed)
	- integrate IPN (via payum)
	- IPN handler:
		- if user (email) exists
		- if user (email) doesn't exist
	- create routes and views:
		- http://mail2sms.co/buymore -> put paypal button / form  there
		- http://mail2sms.co/payment/success
		- http://mail2sms.co/payment/cancel
* boring:
	- http://mail2sms.co/boring/privacypolicy
	- http://mail2sms.co/boring/useragreement
* before final deploy:
	* turn `debug mode` config off for production

### After Shipping:
* switch to Laravel queue for processing incoming mail and sending out sms

## Done:
* install bootstrap, jquery(cdn), theme
* create homepage
* email: show single message
* set up infrastructure (laravel, domain name, pagodabox, mandrill, twilio + env variables in order to avoid showing important data in the github repo)
* set up error pages - 404, 500 with developer warning
* select a theme on wrapbootstrap