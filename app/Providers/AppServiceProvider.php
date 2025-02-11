<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Employee;
use App\Models\Income;
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


        // incomes
        if (Schema::hasTable((new Income)->getTable())) {

            $incomes = Income::all();
            View::share('incomes', $incomes);
        }

 // Skip data sharing during console commands
 if ($this->app->runningInConsole()) {
    return;
}

// Share categories with subcategories if table exists
if (Schema::hasTable((new Category)->getTable())) {
    $categoriesWithSubcategories = Category::with('subcategories')->get();
    View::share('categories', $categoriesWithSubcategories);
}

// Share employees if table exists
if (Schema::hasTable((new Employee)->getTable())) {
    View::share('employees', Employee::all());
}

// Share subscriber categories with subscribers if table exists
if (Schema::hasTable((new SubscriberCategory)->getTable())) {
    $subscriberCategories = SubscriberCategory::with('subscribers')->get();
    View::share('subscriberCategories', $subscriberCategories);
}

// Share post categories with posts if table exists
if (Schema::hasTable((new PostCategory)->getTable())) {
    $postCategories = PostCategory::with('posts')->get();
    View::share('postCategories', $postCategories);
}

// Share information if table exists
if (Schema::hasTable((new Information)->getTable())) {
    $information = Information::first(); 
    View::share('information', $information);
}





    }

}
