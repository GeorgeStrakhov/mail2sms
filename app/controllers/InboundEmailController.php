<?php

class InboundEmailController extends BaseController {

	public function getIndex() //this is needed so that Mandrill can verify the URL
	{
		return 'ok'; 
	}

	public function postIndex() //accepting Mandrill requests from here
	{
		//list of things we care about
		$dataFields = ['raw_msg', 'headers', 'text', 'html', 'subject', 'to', 'from_email', 'from_name'];

		//get the input
		$input = Input::get('mandrill_events');
		$data = json_decode($input);
		if(!$data) return 'nothing passed'; // we need to always return 200 ok so that Mandrill doesn't freak out

		//mandrill can give use several emails in one batch, so iterating over them
		foreach ($data as $key => $event) {
			if(!isset($event->msg)) dd('no msg element');
			$msg = $event->msg;

			//generate a slug and make sure it's unique
			$isUniqueSlug = false;
			$newSlug = Str::random(6);
			while(!$isUniqueSlug) {
				$message = Message::where('slug', $newSlug)->first();
				if($message) {
					$newSlug = Str::random(6);
				} else {
					$isUniqueSlug = true;
				}
			}

			//write the new message to the DB
			$newMessage = new Message;
			$newMessage->slug = $newSlug;
			foreach ($dataFields as $df){
				if(isset($msg->$df)){
					$newMessage->$df = (gettype($msg->$df) == 'object' || gettype($msg->$df) == 'array') ? json_encode($msg->$df) : $msg->$df;
				}
			}
			$newMessage->save();

			//extract the phone number
			if(!$newMessage->to) return '"to" not passed';
			$phoneNumber = '+'.explode('@', $newMessage->to)[0];
			//extract the from email
			if(!$newMessage->from_email) return '"from_email" not passed';
			$senderEmail = $newMessage->fromEmail;

			//find or create the user
			$user = User::where('email', $senderEmail)->first();
			if(!$user) {
				$user = new User;
				$user->email = $userEmail;
				$user->password = Hash::make(Str::random(10));
				$user->credits = 3;
				$user->save();
			}
			
			//try sending a message to twilio
			try {
				//create the sms text
				if($newMessage->from_name && strlen($newMessage->fromName)<25) {
					$who = "$newMessage->from_name ($newMessage->from_email)";
					if(strlen($who)>70) {
						$who = $newMessage->from_email;
					}
				} else {
					$who = $newMessage->from_email;
				}
				$smsText = "Hey! $who sent you a message. Check it out here: http://mail2sms.co/$newMessage->slug";

				//try sending it
				Sms::send(array('to'=>$phoneNumber, 'text'=>$smsText));

			} catch (Exception $e) {
				//if fail - send an email back to the sender with the problem; return;
				$emailData = [
					'remainingCredits' 	=> $user->credits,
					'userEmail'			=> $user->email,
					'error' 			=> $e->getMessage()
				];
				Mail::send('emails.problemswithmessage', $emailData, function($message) use ($user)
				{
					$message->to($user->email)->subject('Ooops, there was a problem with your message.');
				});
				return 'there was an error, sent a message back to the sender with details';
			}

			//all looks good. let's deduct credit from the sender
			$user->credit = $user->credit-1;

			//and send the success message back to the sender
			$emailData = [
				'remainingCredits' 	=> $user->credits,
				'userEmail'			=> $user->email,
				'newMessageSlug' 	=> $newMessage->slug,
				'toNumber' 			=> $phoneNumber
			];
			Mail::send('emails.messagesent', $emailData, function($message) use ($user)
			{
				$message->to($user->email)->subject('Ooops, there was a problem with your message.');
			});

			return 'success!';
			
		}

	}

}