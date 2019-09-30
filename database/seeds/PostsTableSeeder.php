<?php

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(App\Model\User\Post::class, 10)->create()->each(function ($u) {
            $u->tags()->save(factory(App\Model\User\Tag::class)->make());
            $u->categories()->save(factory(App\Model\User\Category::class)->make());

        });
    }
}
