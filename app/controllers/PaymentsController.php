<?php

class PaymentsController extends BaseController {

    /*
    * receive a GET request from paypal IPN service and process it
    */
    public function getIndex()
    {
        //1. write request to the payments table for logging purposes
        $data = Input::all();
        if(!$data) return 'no data passed';
        $txn_id = Input::get('txn_id');
        if(!$txn_id) return 'txn_id not passed';
        self::makePaymentRecord($data, $txn_id);

        //2. check that request is unique - if not - ignore

        //3. check whether the user with this email exists - if not => create the user

        //4. figure out the amount

        //5. add credits to the user

        //6. send an email to the user with the notification

        return 'ok';
    }

    private static function makePaymentRecord($data, $txn_id = null) {
        $jsonData = json_encode($data);
        $paymentRecord = new Payment;
        $paymentRecord->ipn_data = $jsonData;
        $paymentRecord->txn_id = ($txn_id) ? $txn_id : '';
        $paymentRecord->save();
    }

}