<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$users=[
    			(['name'=>'contributor','email'=>'contributor@ypb.or.id','password'=>bcrypt('contributor'),'role'=>1]),
                (['name'=>'admin','email'=>'admin@ypb.or.id','password'=>bcrypt('admin'),'role'=>2])
    			];
        foreach ($users as $user) {
            User::create($user);
        }
    }
}
