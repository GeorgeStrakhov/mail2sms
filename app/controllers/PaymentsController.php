<?php

class PaymentsController extends BaseController {

    /*
    * receive a GET request from paypal IPN service and process it
    */
    public function getIndex()
    {
        echo var_dump(Input::all());
        return;
    }

}