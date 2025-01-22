<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\SubscriberCategory;

class SubscriberCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $categories = [
            ['id' => 1, 'name' => 'Instagram'],
            ['id' => 2, 'name' => 'YouTube'],
            ['id' => 3, 'name' => 'TikTok'],
            ['id' => 4, 'name' => 'Facebook'],
        ];

        foreach ($categories as $category) {
            SubscriberCategory::create($category);
        }
   
    }
}
