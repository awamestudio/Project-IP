<?php
// app/database/seeds/UserTableSeeder.php

class UserTableSeeder extends Seeder
{

	public function run()
	{
		DB::table('users')->delete();
		User::create(array(
			'email'    => 'test@dotip.net',
			'password' => Hash::make('isaac2hk'),
		));
	}

}
