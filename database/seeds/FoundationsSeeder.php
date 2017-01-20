<?php

use Illuminate\Database\Seeder;
use App\Model\Foundation;
class FoundationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        Foundation::insert([
                            'keyword'=> $faker->text($maxNbChars = 200),
                            'title'=> $faker->name,
                            'motto'=> $faker->text($maxNbChars = 200),
                            'visions'=> $faker->text($maxNbChars = 200),
                            'missions'=> $faker->text($maxNbChars = 200)]);
    }
}
