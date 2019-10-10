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
        	'avatar' => asset('avatars/avatar.png'),
        	'password' => bcrypt('admin'),
        	'email' => 'admin@forum.ao',
          'provider' => '',
          'provider_id' => '',
        	'admin' => 1,
        ]);

        App\User::create([
            'name' => 'Rixton Muel',
            'avatar' => asset('img/avatar.png'),
            'password' => bcrypt('password'),
            'email' => 'rixton@nex.forum',
            'provider' => '',
            'provider_id' => '',
            
        ]);
    }
}
