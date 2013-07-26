<?php

class UsersTableSeeder extends Seeder {

    public function run()
    {
    	// Uncomment the below to wipe the table clean before populating
    	// DB::table('users')->delete();

		$alreadySeeded = DB::table('users')->where('email', '=', 'will.shakespeare@gmail.com')->first(); //our Shakespeare user is already in
    	if($alreadySeeded) return;

        $users = array(
        	[
        		'email'		=> 'will.shakespeare@gmail.com',
        		'password'	=> Hash::make(Str::random(10)),
        		'credits'	=> 100
        	]
        );

        // Uncomment the below to run the seeder
        DB::table('users')->insert($users);
    }

}