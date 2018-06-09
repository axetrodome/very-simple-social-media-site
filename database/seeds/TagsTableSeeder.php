<?php

use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $post = factory(App\Models\Post::class,20)->create()->each(function($post){
		        $post->tags()->saveMany(factory(App\Models\Tag::class,3)->create());
        });
    }
}
