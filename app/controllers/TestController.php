<?php

class TestController extends BaseController {

	public function getIndex() {
		return 'test index here';
	}

	public function getTestemail() {
		$user = User::where('email', 'george.strakhov@gmail.com')->first();
		$emailData = array(
			'remainingCredits' 	=>  $user->credits,
			'userEmail'			=>	$user->email
		);
		Mail::send('emails.welcome', $emailData, function($message) use ($user)
		{
			$message->to($user->email)->subject('Welcome to mail2sms!');
		});
		return 'ok';
	}


}