<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // ここに追記することでダミー投入
        $this->call([
            UserSeeder::class,
            CommentSeeder::class,
        ]);

        // factoryはcall外に書く
        \App\Models\Product::factory(1000)->create();
    }
}
