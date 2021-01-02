<?php

use Illuminate\Database\Seeder;
use App\Comment;

class CommentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('comments')->truncate();

        Comment::create(array(
            'author' => 'agung setiawan',
            'text' => 'the awesomeness of laravel'
        ));

        Comment::create(array(
            'author' => 'nanda oktavian',
            'text' => 'PHP programming is fun'
        ));

    }
}
