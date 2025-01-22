<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        $this->call([
            CategoriesSeeder::class,
            SubCategoriesSeeder::class,
            PostCategoriesSeeder::class,
            PostsSeeder::class,
            SubscriberCategoriesSeeder::class,
            SubscribersSeeder::class,
            EmployeesSeeder::class,
            UserSeeder::class,
            InformationSeeder::class,
        ]);
    }
}
