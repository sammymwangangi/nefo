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
        	'avatar' => asset('/img/user.png'),
        	'password' => bcrypt('admin'),
        	'email' => 'admin@forum.ao',
          'provider' => 'NULL',
          'provider_id' => 'NULL',
        	'admin' => 1,
        ]);

        App\User::create([
            'name' => 'Rixton Muel',
            'avatar' => asset('/img/avatar.png'),
            'password' => bcrypt('password'),
            'email' => 'rixton@nex.forum',
            'provider' => 'NULL',
            'provider_id' => 'NULL',
            
        ]);

        App\User::create([
            'name' => 'Muel Sam',
            'avatar' => asset('/img/avatar.png'),
            'password' => bcrypt('12345678'),
            'email' => 'muel@nefo.com',
            'provider' => 'NULL',
            'provider_id' => 'NULL',
            
        ]);
    }
}
