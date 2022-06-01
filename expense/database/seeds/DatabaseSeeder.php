<?php

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
        // コメントアウト解除
        // Userを規定の名前に変更
        $this->call(BooksTableSeeder::class);
    }
}
