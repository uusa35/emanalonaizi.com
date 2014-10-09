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
                'twitter' => 'mytwitter',
                'facebook' => 'myfacebook',
                'instagram' => 'myinstagram',
			]);
            User::create([
                'username' => 'user',
                'password' => Hash::make('user'),
                'email' => 'usama.ahmed@live.com',
                'twitter' => 'mytwitter',
                'facebook' => 'myfacebook',
                'instagram' => 'myinstagram',
            ]);

	}

}