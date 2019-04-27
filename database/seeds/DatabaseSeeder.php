<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserTableSeeder::class);
        // 
        
        DB::table('users')->insert([
        	'name' => 'Nguyễn Gia Hào',
	        'email' => 'nguyente9899@gmail.com',
	        'email_verified_at' => now(),
	        'password' => bcrypt('123456'),
	        'remember_token' => Str::random(10),
        ]);
    }
}
