<?php

use Illuminate\Database\Seeder;
use App\Model\School;

class SchoolsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $schools=[
        			(['title'=>'SMP BATIK SURAKARTA', 'keyword'=>'SMP BATIK SURAKARTA','grade'=>7, 'name'=>'SMP BATIK SURAKARTA', 'address'=>'SURAKARTA','visions'=>'visi SMP BATIK SURAKARTA','missions'=>'misi SMP BATIK SURAKARTA', 'description'=>'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo']),
        			(['title'=>'SMP BATIK PROGRAM KHUSUS SURAKARTA', 'keyword'=>'SMP BATIK PROGRAM KHUSUS SURAKARTA','grade'=>7, 'name'=>'SMP BATIK PROGRAM KHUSUS SURAKARTA', 'address'=>'SURAKARTA','visions'=>'visi SMP BATIK PROGRAM KHUSUS SURAKARTA','missions'=>'misi SMP BATIK PROGRAM KHUSUS SURAKARTA', 'description'=>'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo']),
        			(['title'=>'SMA BATIK 1 SURAKARTA', 'keyword'=>'SMA BATIK 1 SURAKARTA','grade'=>10, 'name'=>'SMA BATIK 1 SURAKARTA', 'address'=>'SURAKARTA','visions'=>'visi SMA BATIK 1 SURAKARTA','missions'=>'misi SMA BATIK 1 SURAKARTA', 'description'=>'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo']),
        			(['title'=>'SMA BATIK 2 SURAKARTA', 'keyword'=>'SMA BATIK 2 SURAKARTA','grade'=>10, 'name'=>'SMA BATIK 2 SURAKARTA', 'address'=>'SURAKARTA','visions'=>'visi SMA BATIK 2 SURAKARTA','missions'=>'misi SMA BATIK 2 SURAKARTA', 'description'=>'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo']),
        			(['title'=>'SMK BATIK 1 SURAKARTA', 'keyword'=>'SMK BATIK 1 SURAKARTA','grade'=>10, 'name'=>'SMK BATIK 1 SURAKARTA', 'address'=>'SURAKARTA','visions'=>'visi SMK BATIK 1 SURAKARTA','missions'=>'misi SMK BATIK 1 SURAKARTA', 'description'=>'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo']),
        			(['title'=>'SMK BATIK 2 SURAKARTA', 'keyword'=>'SMK BATIK 2 SURAKARTA','grade'=>10, 'name'=>'SMK BATIK 2 SURAKARTA', 'address'=>'SURAKARTA','visions'=>'visi SMK BATIK 2 SURAKARTA','missions'=>'misi SMK BATIK 2 SURAKARTA', 'description'=>'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo']),
        		];
        foreach ($schools as $school) {
        	School::insert($school);
        };
    }
}
