<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class ContactusTableSeeder extends Seeder {

	public function run()
	{
        DB::table('contactus')->truncate();
		$faker = Faker::create();


			Contactus::create([
                'name' => 'Usama Ahmed',
                'address'       => $faker->address,
                'tel'           => $faker->phoneNumber,
                'mobile'        => $faker->phoneNumber,
                'email'         => 'uusa35@gmail.com',
                'facebook'      => 'usama.ahmed.mohamed',
                'twitter'       => 'usama',
                'instagram'     => 'uusa35'
			]);

	}

}