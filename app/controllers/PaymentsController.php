<?php

use Buzz\Client\Curl;
use Payum\Paypal\Ipn\Api;

class PaymentsController extends BaseController {

	/*
	* receive a GET request from paypal IPN service and process it
	*/
	public function getIndex()
	{
		return self::processRequest();
	}

	//or does it send a POST request?
	public function postIndex()
	{
		return self::processRequest();
	}

	private static function processRequest()
	{
		//1. check for validity and uniqueness and write request to the payments table
		$data = Input::all();
		if(!$data) return 'no data passed';

		$txn_id = Input::get('txn_id');
		if(!$txn_id) return 'txn_id not passed';

		//$isValid = self::checkIpnValid($data);
		//if(!$isValid) return 'reuqest not valid';

		$alreadyProcessed = Payment::where('txn_id', '=', $txn_id)->first();
		//if($alreadyProcessed) return 'transaction with this id already processed';

		self::makePaymentRecord($data, $txn_id);

		//2. check whether the user with this email exists - if not => create the user
		$userEmail = Input::get('custom');
		if(!$userEmail) throw new Exception('Email not passed');
		$user = User::where('email', '=', $userEmail)->first();
		if(!$user) {
			$user = new User;
			$user->email = $userEmail;
			$user->password = Hash::make(Str::random(10));
			$user->credits = 3;
			$user->save();
		}

		//3. figure out the amount
		$credits = 0;
		$amount = (float) Input::get('mc_gross');
		if(!$amount) throw new Exception('amount not passed');
		if($amount<0.3) throw new Exception('amount not allowed');
		if($amount<=1) {
			$credits = (int) ceil(100*$amount/10); //10 cents per message
		}
		if(1<$amount && $amount<=5) {
			$credits = (int) ceil(100*$amount/5); //5 cents per message
		}
		if(5<$amount) {
			$credits = (int) ceil(100*$amount/3.33); //3.33 cents per message
		}
		//4. add credits to the user
		$user->credits = $user->credits + $credits;
		$user->save();

		//5. send an email to the user with the notification

		return 'ok';
	}

	private static function makePaymentRecord($data, $txn_id = null)
	{
		$jsonData = json_encode($data);
		$paymentRecord = new Payment;
		$paymentRecord->ipn_data = $jsonData;
		$paymentRecord->txn_id = ($txn_id) ? $txn_id : '';
		$paymentRecord->save();
		return true;
	}

	private static function checkIpnValid($data)
	{
		$isValid = false;

		$api = new Api(new Curl, array(
		    'sandbox' => false
		));

		if (Api::NOTIFY_VERIFIED === $api->notifyValidate($_GET)) {
		    $isValid = true;
		}

		return $isValid;
	}

}