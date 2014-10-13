<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class CommentTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		foreach(range(1, 10) as $index)
		{
			Comment::create([
                'title'     => $faker->sentence(1),
                'body'      => $faker->paragraph(5),
                'post_id'   => $faker->randomDigit(0,10),
                'user_id'   => $faker->numberBetween(0,1),
			]);
		}
	}

}