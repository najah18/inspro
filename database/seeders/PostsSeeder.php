<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Post;
use App\Models\PostCategory;
use Illuminate\Database\Seeder;


class PostsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $postCategory = PostCategory::first();

        $posts = [
            [
                'title' => 'New AI Application',
                'content' => 'Details about the latest AI apps.',
                'slug' => 'ai-new-app',
                'status' => 'published',
                'photo' => 'images/posts/1.jpg',
                'post_category_id' => $postCategory->id,
            ],
            [
                'title' => 'Phone Review',
                'content' => 'A detailed review of the latest phone.',
                'slug' => 'phone-review',
                'status' => 'draft',
                'photo' => 'images/posts/2.jpg',
                'post_category_id' => $postCategory->id,
            ],
        ];

        foreach ($posts as $post) {
            Post::create($post);
        }
    }
}
