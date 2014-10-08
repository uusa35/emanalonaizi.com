<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class CategoryPostTableSeeder extends Seeder {

	public function run()
	{
        //DB::table('category_post')->truncate();
		$faker = Faker::create();

		foreach(range(1, 10) as $index)
		{
			CategoryPost::create([
                'category_id' => $faker->randomDigit(range(1,10)),
                'post_id'     => $faker->randomDigit(range(1,10))
			]);
		}
	}

}