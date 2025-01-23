<?php

use App\Http\Controllers\AdminsContoller;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\InformationController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\SubscriberCategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\TransactionController;
use App\Models\SubCategory;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('layouts.main');
    })->name('dashboard');
});

Route::get('/' ,[GalleryController::class , 'index'])->name('gallery.index');
Route::get('/categories/{id}/subcategories', [SubCategoryController::class, 'index'])->name('subcategories.index1');
Route::get('/subcategory/{id}', [SubcategoryController::class, 'show'])->name('subcategories.show');


// favorite


Route::get('/add-wishlist/{id}' , [FavoriteController::class, 'addWishlist']);
Route::get('/remove-wishlist/{id}', [FavoriteController::class, 'removeWishlist']);

Route::get('/favorites', [FavoriteController::class, 'showFavorites'])->name('favorites');



// admin panel 
Route::get('/admin' , [AdminsContoller::class , 'index'])->name('admin.index')->middleware('can:update-info');
// category 
Route::get('/admin/categories' , [CategoryController::class , 'index'])->name('categories.index')->middleware('can:update-info');
Route::get('/admin/categories/create' , [CategoryController::class , 'create'])->name('categories.create')->middleware('can:update-info');
Route::post('/categories/store', [CategoryController::class, 'store'])->name('categories.store')->middleware('can:update-info');
// عرض تفاصيل الفئة
Route::get('/admin/categories/{id}', [CategoryController::class, 'show'])->name('categories.show')->middleware('can:update-info');

// تعديل الفئة
Route::get('/admin/categories/{id}/edit', [CategoryController::class, 'edit'])->name('categories.edit')->middleware('can:update-info');
Route::put('/admin/categories/{id}', [CategoryController::class, 'update'])->name('categories.update')->middleware('can:update-info');

// حذف الفئة
Route::delete('/admin/categories/{id}', [CategoryController::class, 'destroy'])->name('categories.destroy')->middleware('can:update-info');



// subcategory
Route::get('/admin/subcategories' , [SubCategoryController::class , 'showCategories'])->name('subcategories.index')->middleware('can:update-info');
Route::get('/admin/subcategories/filter/{category?}', [SubCategoryController::class, 'filterByCategory'])->name('subcategories.filter')->middleware('can:update-info');

// عرض صفحة إنشاء قسم فرعي
Route::get('/admin/subcategories/create', [SubCategoryController::class, 'create'])->name('subcategories.create')->middleware('can:update-info');

// حفظ قسم فرعي جديد
Route::post('/subcategories/store', [SubCategoryController::class, 'store'])->name('subcategories.store')->middleware('can:update-info');

// عرض صفحة تعديل قسم فرعي
Route::get('/admin/subcategories/{id}/edit', [SubCategoryController::class, 'edit'])->name('subcategories.edit')->middleware('can:update-info');

// تحديث بيانات قسم فرعي
Route::put('/subcategories/{id}', [SubCategoryController::class, 'update'])->name('subcategories.update')->middleware('can:update-info');

// حذف قسم فرعي
Route::delete('/subcategories/{id}', [SubCategoryController::class, 'destroy'])->name('subcategories.destroy')->middleware('can:update-info');

// view
Route::get('/admin/subcategories/{id}', [SubCategoryController::class, 'showadmin'])->name('subcategories.showadmin')->middleware('can:update-info');


// employee


Route::resource('employees', EmployeeController::class)->middleware('can:update-info');


// information
Route::prefix('admin')->name('admin.')->group(function() {
    Route::resource('informations', InformationController::class);
})->middleware('can:update-info');


//users

Route::get('/admin/users',[UsersController::class,'index'])->name('users.index')->middleware('can:update-users');
Route::patch('/admin/users/{user}', [UsersController::class, 'update'])->name('users.update')->middleware('can:update-users');
Route::delete('/users/{user}', [UsersController::class, 'destroy'])->name('users.destroy');







//accounting

Route::get('/admin/transactions/create', [TransactionController::class, 'create'])->name('admin.transactions.create');
Route::post('/admin/transactions/store', [TransactionController::class, 'store'])->name('admin.transactions.store');
Route::get('/admin/transactions', [TransactionController::class, 'index'])->name('admin.transactions.index');










