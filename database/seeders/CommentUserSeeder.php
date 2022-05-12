<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CommentUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //DB::table(テーブル名)
        DB::table('comment_user')->insert([
            [ 
                'user_id' => 1,
                'comment_id' => 1
            ],
            [ 
                'user_id' => 1,
                'comment_id' => 2
            ],
            [ 
                'user_id' => 2,
                'comment_id' => 1
            ],

        ]);
    }
}
