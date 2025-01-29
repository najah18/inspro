<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Employee;
use App\Models\Information;
use App\Models\PostCategory;
use App\Models\SubscriberCategory;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {


        // View::share('categories', Category::all());
        // View::share('employees', Employee::all());



        //         // جلب الـ categories مع الـ subcategories المرتبطة بها
        //         $categoriesWithSubcategories = Category::with('subcategories')->get();

        //         // مشاركة البيانات مع جميع العروض
        //         View::share('categories', $categoriesWithSubcategories);
            


            
        //              // جلب الفئات مع المشتركين المرتبطين بها
        //              $postCategories = PostCategory::with('posts')->get();

        //              // مشاركة البيانات مع جميع العروض
        //              View::share('postCategories', $postCategories);
                     

        //             $information = Information::first(); 
        //             View::share('information', $information);

        
           // Skip data sharing if running in the console (CLI)
    if ($this->app->runningInConsole()) {
        return;
    }

    // Share categories with subcategories if the table exists
    if (Schema::hasTable((new Category)->getTable())) {
        $categoriesWithSubcategories = Category::with('subcategories')->get();
        View::share('categories', $categoriesWithSubcategories);
    }

    // Share employees if the table exists
    if (Schema::hasTable((new Employee)->getTable())) {
        View::share('employees', Employee::all());
    }

    // Share post categories with posts if the table exists
    if (Schema::hasTable((new PostCategory)->getTable())) {
        $postCategories = PostCategory::with('posts')->get();
        View::share('postCategories', $postCategories);
    }

    // Share information if the table exists
    if (Schema::hasTable((new Information)->getTable())) {
        $information = Information::first();
        View::share('information', $information);
    }

    }


}
