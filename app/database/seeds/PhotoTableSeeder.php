<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class PhotoTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		foreach(range(1, 10) as $index)
		{
			Photo::create([
                'post_id'   => $faker->randomDigit(1,10),
                'path' => $faker->imageUrl('640', '480'),

			]);
		}
	}

}