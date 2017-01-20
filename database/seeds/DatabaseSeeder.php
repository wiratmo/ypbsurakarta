<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*$this->call(UsersSeeder::class);
        $this->call(ArticlesSeeder::class);
        $this->call(SchoolsSeeder::class);*/
        /*$this->call(AgendasSeeder::class);*/
        /*$this->call(FoundationsSeeder::class);*/
        $this->call(PicturesSeeder::class);
    }
}
