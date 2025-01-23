<?php


namespace Database\Seeders;
use App\Models\SubCategory;
use App\Models\Category;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $category = Category::first();

        $subCategories = [
            [
                'photo'=>'images/1.jpg',
                'id' => 1 ,
                'name' => 'Apps',
                'description' => 'Latest news about apps. Latest news about apps.Latest news about apps.Latest news about apps.Latest news about apps.Latest news about apps.Latest news about apps.Latest news about apps.Latest news about apps.Latest news about apps.Latest news about apps.Latest news about apps.Latest news about apps.Latest news about apps.Latest news about apps.Latest news about apps.Latest news about apps.Latest news about apps.Latest news about apps.Latest news about apps.Latest news about apps.Latest news about apps.Latest news about apps.Latest news about apps.Latest news about apps.Latest news about apps.Latest news about apps.Latest news about apps.',
                'price'=> 50.5,
                'category_id' => '1',
            ],
            [
                'photo'=>'images/2.jpg',
                'id' => 3 ,
                'name' => 'Devices',
                'description' => 'Reviews of the latest devices.',
                'price'=> 100,
                'category_id' => '3',
            ],
        ];

        foreach ($subCategories as $subCategory) {
            SubCategory::create($subCategory);
        }
    }
}
