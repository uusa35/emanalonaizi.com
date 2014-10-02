<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class PostTableSeeder extends Seeder {

	public function run()
	{
        DB::table('posts')->truncate();
		$faker = Faker::create();

		foreach(range(1, 10) as $index)
		{
			Post::create([
                'title'     => $faker->sentence(6),
                'body'      => $faker->paragraph(6),
                'counter'   => $faker->randomDigit(range(1,40))
			]);
		}
	}

}