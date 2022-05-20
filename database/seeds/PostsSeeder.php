<?php

use Illuminate\Database\Seeder;

class PostsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->insert([
            'post_date' => '2022/05/16',
            'category_id' => 1,
            'title' => 'Título teste',
            'summary' => 'Sumário teste',
            'text' => 'Texto teste',
            'active' => true,
            'link_file' => 'url.com'
        ]);
    }
}
