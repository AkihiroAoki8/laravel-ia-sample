<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
// マニュアルからコピペ
use Illuminate\Support\Facades\DB;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DBテーブルの名前 複数形
        // []のなかに[]を含めるので注意
        DB::table('comments')->insert([
            [ 'content' => 'テスト1'],
            [ 'content' => 'テスト2'],
            [ 'content' => 'テスト3'],
        ]);
    }
}
