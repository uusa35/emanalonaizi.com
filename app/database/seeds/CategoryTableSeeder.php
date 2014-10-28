<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class CategoryTableSeeder extends Seeder {

	public function run()
	{
        //DB::table('categories')->truncate();
		/*$faker = Faker::create();*/
        $categories_list = [
            'صباحات',
            'شكرا',
            'حيادية',
            'مقالات',
            'مقالات مختارة',
            'العالم ثقافات',
            'إلتقط الجمال',
            'حقائق',
            'نحو وبلاغة',
            'هنا ملعبك'
            ];

		foreach($categories_list as $category)
		{
			Category::create([
                'name' => $category
			]);
		}
	}
    public function down()
    {
        Schema::drop('category');
    }

}
