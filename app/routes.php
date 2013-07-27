<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/


Route::controller('/test', 'TestController');

Route::resource('/m', 'MessagesController');


/*
* Inbound hook for mandrill
* we don't want to expose our API hook for everybody to open massive sms spam, so we use env variable to declare the secret route for the hook
*/
$secretMandrillHook = isset($_SERVER['MANDRILL_SECRET_HOOK']) ? $_SERVER['MANDRILL_SECRET_HOOK'] : null;
Route::controller('/api/inboundemailhook/'.$secretMandrillHook, 'InboundEmailController');

/*
* paypal ipn hook for getting notified when a payment is made
* again, hide the url via using env variable
*/
$secretPaypalHook = isset($_SERVER['PAYPAL_SECRET_HOOK']) ? $_SERVER['PAYPAL_SECRET_HOOK'] : null;
Route::controller('/api/paypalipnhook/'.$secretPaypalHook, 'PaymentsController');

Route::controller('/', 'HomeController');