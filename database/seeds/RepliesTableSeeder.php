<?php

use Illuminate\Database\Seeder;
use App\Reply;

class RepliesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $r1 = [
        	'user_id' => 1,
        	'discussion_id' => 1,
        	'content' => 'Cicero famously orated against his political opponent Lucius Spatientia nostra? Quamuus nos eludet? (How long, O Catiline, will you abuse our patience? And for how long will that madness of yours mock us?)'

        ];

        $r2 = [
        	'user_id' => 2,
        	'discussion_id' => 2,
        	'content' => 'Cicero famously orated against his political opponent Lucius Spatientia nostra? Quamuus nos eludet? (How long, O Catiline, will you abuse our patience? And for how long will that madness of yours mock us?)'

        ];
        
        $r3 = [
        	'user_id' => 2,
        	'discussion_id' => 3,
        	'content' => 'Cicero famously orated against his political opponent Lucius Spatientia nostra? Quamuus nos eludet? (How long, O Catiline, will you abuse our patience? And for how long will that madness of yours mock us?)'

        ];
        
        $r4 = [
        	'user_id' => 1,
        	'discussion_id' => 4,
        	'content' => 'Cicero famously orated against his political opponent Lucius Spatientia nostra? Quamuus nos eludet? (How long, O Catiline, will you abuse our patience? And for how long will that madness of yours mock us?)'

        ];

        Reply::create($r1);
        Reply::create($r2);
        Reply::create($r3);
        Reply::create($r4);
    }
}
