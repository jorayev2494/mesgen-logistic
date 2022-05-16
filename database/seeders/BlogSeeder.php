<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Seeder;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        /** @var Collection $categories */
        $categories = BlogCategory::all();
        /** @var Collection $users */
        $users = User::all(['id']);
        $tags = Tag::all();

        /**
         * @var BlogCategory $category
         */
        foreach ($categories as $category) {
            $category->blogs()->saveMany(
                Blog::factory(random_int(4, 15))->make(
                    ['user_id' => $users->random()->first()->id]
                )
            );
        }
        
        Blog::all()->each(
            fn (Blog $b) => $b->tags()->attach($tags->random(random_int(2, 4))->pluck('id'))
        );
    }
}
