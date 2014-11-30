<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class CategoryTableSeeder extends Seeder {

	public function run()
	{
        //DB::table('categories')->truncate();
		//$faker = Faker::create();
        $categories_list = [
            'صباحات',
            'شكرا',
            'ميزان',
            'مقالات',
            'مقالات مختارة',
            'العالم ثقافات',
            'إلتقط الجمال',
            'جدد إيمانك',
            'نحو وبلاغة',
            'هنا ملعبك',
            'إصدارات'
            ];

        $categories_description = [
            '',
            // thank you category
            'يترك  البعض بصمة مشرقة في حياتنا فلابد من كلمة ...شكر....🌷يترك  البعض بصمة مشرقة في حياتنا فلابد من كلمة ...شكر....🌷',
            '',
            '',

            // choosen articles category
            'هناك الكثير من المقالات الرائعة الضائعة ...وهنا احاول التقاط بعض منها لتكون بينكم  ....ونرحب باختياراتكم أيضاً ...',
            // Cultural World
            'قال تعالى...
يا أيها الناس إنا خلقناكم من ذكر وأنثى وجعلناكم شعوباً وقبائل لتعارفوا إن أكرمكم عند الله أتقاكم إن الله عليم خبير
( سورة الحجرات ...١٣)
فلنتعرف على ثقافات العالم من حولنا ....كيف يفكر !!...و كيف يعيش .!!
',
            // take your beauty category
            'من يعتاد الجمال في كل مكان سوف يستنكر القبح في كل مكان.... لذا علينا أن نلتقط الجمال دوما وفي كل ما حولنا
في ... منظر جميل ... في موقف جميل ... فى كلمة جميلة .... في فكرة جميلة ....
# التقط_الجمال',
            // facts category
            'يقول النبي صلى الله عليه وسلم:
( إن الإيمان ليخلقُ في جوف أحدكم كما يخلق الثوب، فاسألوا الله أن يجدد الإيمان في قلوبكم.)...
 رواه الطبراني والحاكم وحسّنه الألباني
يخلق أى يبلى ..',
            //arabic grammer
            'لاني أحب لغتي العربية ... ولاني أريد ان يتغنى بها الجميع ... ولاني اسمع أبنائي يتذمرون ويتأففون دوما منها...
أردت المحاولة...',
            // your field category
            'ملعبك هنا
   ..اكتب ما تريد ...
 تشعر بالغضب ...اكتب
 ...تشعر بالحزن...اكتب
...تكاد تطير فرحا ...اكتب .
رأيت ما أسعدك ....اكتب
هل لديك سؤال ؟؟... هل تشعر بالحيرة ؟؟...اكتب

هنا مساحة تركتها لك ...( هنا ملعبك )...',
            // different editions
            '',


        ];

		for($i=0;$i<=count($categories_list)-1; $i++) {
			Category::create([
                'category_description' => $categories_description[$i],
                'name' => $categories_list[$i]
			]);

		}
	}
    public function down()
    {
        Schema::drop('category');
    }

}
