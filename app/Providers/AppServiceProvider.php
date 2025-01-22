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
        // language
    
        Schema::defaultStringLength(191);

















        View::share('subscriberCategories', SubscriberCategory::all());
        View::share('categories', Category::all());
        View::share('employees', Employee::all());



                // جلب الـ categories مع الـ subcategories المرتبطة بها
                $categoriesWithSubcategories = Category::with('subcategories')->get();

                // مشاركة البيانات مع جميع العروض
                View::share('categories', $categoriesWithSubcategories);
            
                     // جلب الفئات مع المشتركين المرتبطين بها
                    $subscriberCategories = SubscriberCategory::with('subscribers')->get();

                    // مشاركة البيانات مع جميع العروض
                    View::share('subscriberCategories', $subscriberCategories);
                                        

            
                     // جلب الفئات مع المشتركين المرتبطين بها
                     $postCategories = PostCategory::with('posts')->get();

                     // مشاركة البيانات مع جميع العروض
                     View::share('postCategories', $postCategories);
                     

                    $information = Information::first(); 
                    View::share('information', $information);

    }


}
