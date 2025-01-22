<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\PostCategory;


class PostCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $categories = [
            ['name' => 'Technology'],
            ['name' => 'Health'],
            ['name' => 'Education'],
            ['name' => 'Entertainment'],
        ];

        foreach ($categories as $category) {
            PostCategory::create($category);
        }
    }
}
