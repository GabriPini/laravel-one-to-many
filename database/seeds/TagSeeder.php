<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Tag;
use Faker\Generator as Faker;


class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {


     /*    $tags = ['Coding', 'laravel', 'css', 'js', 'vue' , 'sql'   ];
 */
      /*   foreach ($tags as $tag) {

            $new_tag = new Tag();
            $new_tag->name = $tag;
            $new_tag->slug = Str::slug($new_tag->name) ;
            $new_tag->save();
            # code...
        } */

        for ($i=0; $i < 10 ; $i++) {
            # code...

            $new_tag = new Tag();
            $new_tag->name = $faker->word();
            $new_tag->slug = Str::slug($new_tag->name) ;
            $new_tag->save();
        }
    }
}
