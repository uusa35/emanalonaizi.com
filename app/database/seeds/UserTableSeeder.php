<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class UserTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();
        DB::table('users')->truncate();

			User::create([
                'username' => 'admin',
                'password' => Hash::make('admin'),
                'email' => 'uusa35@gmail.com',
                'first_name' => 'Usama',
                'last_name' => 'ahmed',
                'twitter' => 'mytwitter',
                'facebook' => 'myfacebook',
                'instagram' => 'myinstagram',
                'active'    => true,
			]);
	}

}