<?php

class Message extends Eloquent {
    protected $guarded = array();

    public static $rules = array(
		'text' => 'required',
		'from_name' => 'required'
	);
}