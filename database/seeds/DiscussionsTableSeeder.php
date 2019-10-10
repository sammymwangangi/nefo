<?php

use Illuminate\Database\Seeder;
use App\Discussion;

class DiscussionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $t1 = 'Pagination in Angular not working correctly';
        $t2 = 'Implementing OAUTH2 with laravel passport';
        $t3 = 'CSS3 vs FlexBox';
        $t4 = 'Form validation in Django';

        $d1 = [
        	'title' => $t1,
        	'content' => 'No amet molestie qui, mediocrem maluisset voluptatum an sit, ignota volumus epicuri cum ad. Ei atqui similique mei, an stet iudico dicant has. In liber partem suavitate eum. Ad pro moderatius inciderint, nec choro diceret veritus id. Ea porro paulo vel. Ex vix debitis postulant definitiones. Ad per novum lobortis sententiae, latine luptatum lobortis et quo, doctus sadipscing ius at.',
        	'channel_id' => 2,
        	'user_id' => 2,
        	'slug' => str_slug($t1)

        ];

        $d2 = [
        	'title' => $t2,
        	'content' => 'NCicero famously orated against his political opponent Lucius Sergius Catilina. Occasionally the first Oration against Catiline is taken for type specimens: Quo usque tandem abutere, Catilina, patientia nostra? Quam diu etiam furor iste tuus nos eludet? (How long, O Catiline, will you abuse our patience? And for how long will that madness of yours mock us?',
        	'channel_id' => 1,
        	'user_id' => 1,
        	'slug' => str_slug($t2)

        ];

        $d3 = [
        	'title' => $t3,
        	'content' => 'Pri quodsi recteque ad. Idque virtute detraxit nec an. Et his numquam perfecto petentium. Mei eu persequeris intellegebat, an amet invenire cum. No porro postea corrumpit vim, ex est hinc nibh voluptaria, cu mea volumus insolens voluptaria.',
        	'channel_id' => 7,
        	'user_id' => 2,
        	'slug' => str_slug($t3)

        ];

        $d4 = [
        	'title' => $t4,
        	'content' => 'Graece dicunt an duo, no his dicam eirmod reformidans, quo perpetua argumentum ea. His putant voluptaria te. Est legere quaeque habemus ea, pri id natum clita tamquam. Ex his mucius perpetua, pro id apeirian tacimates, adhuc senserit mediocritatem ut sit. Qui repudiare mnesarchum te, te cum alia intellegat instructior. Sed decore vocent definitiones eu, quo causae reformidans ex, saepe expetendis nec ei.',
        	'channel_id' => 8,
        	'user_id' => 1,
        	'slug' => str_slug($t4)

        ];

        Discussion::create($d1);

        Discussion::create($d2);

        Discussion::create($d3);

        Discussion::create($d4);
    }
}
