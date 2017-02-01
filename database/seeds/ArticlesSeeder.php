<?php

use Illuminate\Database\Seeder;
use App\Model\Category;
use App\Model\Tag;
use App\Model\Article;
class ArticlesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$faker = Faker\Factory::create();

        for ($i=0; $i < 15 ; $i++) { 
        	Category::insert([
                            'title'=> $faker->name,
                            'keyword'=> $faker->text($maxNbChars = 200),
                            'name'=> $faker->name,
                            'slug'=> $faker->slug,
                            'description'=> $faker->text($maxNbChars = 200)]
        		);

        };
        /*
        for ($i=0; $i < 15 ; $i++) { 
        	Tag::insert(
        		['title'=> $faker->name,
                                'keyword'=> $faker->text($maxNbChars = 200),
                                'name'=> $faker->name,
                                'slug'=> $faker->slug,
                                'description'=> $faker->text($maxNbChars = 200)
                                ]);
        };
        for ($i=0; $i < 20 ; $i++) { 
        	$article = Article::insert(
                            ['user_id'=> $faker->numberBetween($min=1, $max=2),
                            'keyword'=> $faker->text($maxNbChars = 200),
                            'title'=> $faker->name,
                            'slug'=> $faker->slug,
                            'description'=> $faker->text($maxNbChars = 200),
                            'content'=> $faker->text($maxNbChars = 200)
                            ]);
            $article->categories()->sync($faker->numberBetween[$min=1, $max=5]);
            $article->tags()->sync($faker->numberBetween[$min=1, $max=15]);
        };*/
    }
}
