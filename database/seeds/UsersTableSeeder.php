<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
      public function run()
    {
        App\User::create([
            'name' => 'admin',
            'avatar' => 'user.png',
            'cover' => 'default.png',
        	'password' => bcrypt('admin'),
        	'email' => 'admin@forum.ao',
            'provider' => 'NULL',
            'provider_id' => 'NULL',
            'about' => 'The administrator of this forum app',
        	'admin' => 1,
        ]);

        App\User::create([
            'name' => 'Rixton Muel',
            'avatar' => 'user.png',
            'cover' => 'default.png',
            'password' => bcrypt('password'),
            'email' => 'rixton@nex.forum',
            'provider' => 'NULL',
            'provider_id' => 'NULL',
            'about' => 'Full-Stack Developer,specializing in Python Django,NodeJS, ReactJS,PHP/Laravel. Cybersecurity Enthusiast. Maintainer at https://forum.nextechdevelopers.co',
            
        ]);

        App\User::create([
            'name' => 'Muel Sam',
            'avatar' => 'user.png',
            'cover' => 'default.png',
            'password' => bcrypt('12345678'),
            'email' => 'muel@nefo.com',
            'provider' => 'NULL',
            'provider_id' => 'NULL',
            'about' => 'Full-Stack Developer,specializing in Python Django,NodeJS, ReactJS,PHP/Laravel. Cybersecurity Enthusiast. Maintainer at https://forum.nextechdevelopers.co',
            
        ]);
    }
}
