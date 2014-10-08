<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class AboutusTableSeeder extends Seeder {

	public function run()
	{
        DB::table('aboutus')->truncate();
		$faker = Faker::create();

		foreach(range(1, 2) as $index)
		{
			Aboutus::create([
                'title' => $faker->sentence(3),
                'body'  => $faker->paragraph(3)
			]);
		}
	}

}