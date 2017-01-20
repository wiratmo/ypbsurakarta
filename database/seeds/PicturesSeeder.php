<?php

use Illuminate\Database\Seeder;
use App\Model\Tag;
use App\Model\Picture;
class PicturesSeeder extends Seeder
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
        	$tag= Picture::insert([
        		'title'=> $faker->name,
                'keyword'=> $faker->text($maxNbChars = 200),
                'name'=> $faker->name,
                'location'=> '/medium/500x500.png',
                'category' => 1,
                'description'=> $faker->text($maxNbChars = 200),
                ]);
        };

        for ($i=0; $i < 4 ; $i++) { 
        	$tag= Picture::insert([
        		'title'=> $faker->name,
                'keyword'=> $faker->text($maxNbChars = 200),
                'name'=> $faker->name,
                'location'=> '/medium/500x500.png',
                'category' => 2,
                'description'=> $faker->text($maxNbChars = 200),
                ]);
            
        };

    }
}
