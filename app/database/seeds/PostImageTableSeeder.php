<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class PostImageTableSeeder extends Seeder {

	public function run()
	{
        DB::table('post_images')->truncate();
		$faker = Faker::create();

		foreach(range(1, 10) as $index)
		{
			PostImage::create([
                'imgUrl' => 'http://placehold.it/150x150',
                'blogId' => $faker->randomDigit(range(0,9))
			]);
		}
	}

}