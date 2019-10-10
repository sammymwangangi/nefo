<?php

use Illuminate\Database\Seeder;
use App\Channel;

class ChannelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $channel1 = ['title' => 'Laravel', 'slug' => str_slug('Laravel') ];
        $channel2 = ['title' => 'Angular', 'slug' => str_slug('Angular') ];
        $channel3 = ['title' => 'PHP', 'slug' => str_slug('PHP') ];
        $channel4 = ['title' => 'JAVA', 'slug' => str_slug('JAVA') ];
        $channel5 = ['title' => 'Android', 'slug' => str_slug('Android') ];
        $channel6 = ['title' => 'Javascript', 'slug' => str_slug('Javascript') ];
        $channel7 = ['title' => 'CSS3', 'slug' => str_slug('CSS3') ];
        $channel8 = ['title' => 'Python', 'slug' => str_slug('Python') ];
        $channel9 = ['title' => 'Ruby', 'slug' => str_slug('Ruby') ];


        Channel::create($channel1);
        Channel::create($channel2);
        Channel::create($channel3);
        Channel::create($channel4);
        Channel::create($channel5);
        Channel::create($channel6);
        Channel::create($channel7);
        Channel::create($channel8);
        Channel::create($channel9);
    }
}
