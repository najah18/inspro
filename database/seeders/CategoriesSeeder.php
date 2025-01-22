<?php

namespace Database\Seeders;
use App\Models\Category;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $categories = [
            [
                'name' => 'Social media managment',
                'description' => 'This category covers all aspects of modern technology, including the latest software developments, technological innovations, and the impact of technology on society. Whether it’s AI, programming, or consumer gadgets, you’ll find insightful articles and discussions here.',
                'photo' => 'images/media.svg',
            ],
            [
                'name' => 'film maker and videographer',
                'description' => 'Sports enthusiasts will find this category perfect for staying up to date with the latest news, match results, and analysis from various sports around the world. From football to basketball and everything in between, this category covers it all.',
                'photo' => 'images/video.svg',
            ],
            [
                'name' => 'content creator',
                'description' => 'Explore various cultural topics in this category, ranging from art and history to modern trends and social movements. We delve into the richness of cultures worldwide, celebrating diversity and the influence of culture on shaping our identities and societies.',
                'photo' => 'images/content.svg',
            ],
            [
                'name' => 'youtube academy',
                'description' => 'Stay tuned to the latest in music trends, artist news, album reviews, and musical movements. This category explores all genres from classical to contemporary, bringing you the most exciting and fresh sounds in the music industry.',
                'photo' => 'images/youtube.svg',
            ],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
