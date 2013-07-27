<?php

class InboundEmailController extends BaseController {

    public function getIndex() //this is needed so that Mandrill can verify the URL
    {
        return 'ok'; 
    }

    public function postIndex() //accepting Mandrill requests from here
    {
        //get the input
        
        //make sure that all the key properties are there

    	//generate a slug and save in the db
    		//NB! make sure the slug is unique first

    	//try sending a message to twilio

    		//if fail - send an email back to the sender with the problem; return;

    	//send a success message back to the sender
    		//link to the message
    		//remaining credits
    		//link to buy more credits

    }

}