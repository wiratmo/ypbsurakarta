<?php

use Illuminate\Database\Seeder;
use App\Model\Agenda;
class AgendasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        for ($i=0; $i <10 ; $i++) { 
        	Agenda::insert([
        		'name'=> $faker->name,
        		'description'=> $faker->text,
        		'implementation' =>$faker->dateTime($max = 'now', $timezone = date_default_timezone_get()) ,
        		'place'=> $faker->address
        		]);

        }
    }
}
