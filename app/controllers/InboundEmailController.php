<?php

class InboundEmailController extends BaseController {

    public function getIndex() //this is needed so that Mandrill can verify the URL
    {
        return 'ok'; 
    }

    public function postIndex() //accepting Mandrill requests from here
    {
        
    }

}