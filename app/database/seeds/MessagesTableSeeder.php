<?php

class MessagesTableSeeder extends Seeder {

    public function run()
    {
    	// Uncomment the below to wipe the table clean before populating
    	//DB::table('messages')->delete();

    	$alreadySeeded = DB::table('messages')->where('slug', '=', 'e7r8w1')->first(); //our Shakespeare message is already in
    	if($alreadySeeded) return;

        $messages = array(
        	[
        		'slug'			=>	'e7r8w1',
        		'from_email'	=>	'will.shakespeare@gmail.com',
        		'from_name'		=>	'William',
        		'subject'		=>	'Is this ending any good?',
        		'text'			=>	'A glooming peace this morning with it brings;\nThe sun, for sorrow, will not show his head:\nGo hence, to have more talk of these sad things;\nSome shall be pardon\'d, and some punished:\nFor never was a story of more woe\nThan this of Juliet and her Romeo.\n\n\n Is it any good?\n Would really appreciate your opinion, mate. I\'m having the most terrible hangover ever and the publisher is chasing me.\n\nThanks a ton!\nWill.'

        	]
        );

        // Uncomment the below to run the seeder
        DB::table('messages')->insert($messages);
    }

}