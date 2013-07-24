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

Route::get('/', function()
{
	return Str::random(20);
	return View::make('hello');
});

Route::controller('/test', 'TestController');

Route::resource('messages', 'MessagesController');


/*
* Inbound hook for mandrill
* we don't want to expose our API hook for everybody to open massive sms spam, so we use env variable to declare the secret route for the hook
*/
$secretMandrillHook = isset($_SERVER['MANDRILL_SECRET_HOOK']) ? $_SERVER['MANDRILL_SECRET_HOOK'] : null;
Route::controller('/api/inboundemailhook/'.$secretMandrillHook, 'InboundEmailController');