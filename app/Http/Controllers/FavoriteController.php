<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Favorite;
use App\Models\SubCategory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FavoriteController extends Controller
{




    public function addWishlist($subcategoryId)
    {
        if (Auth::check()) {
            $userId = Auth::user()->id;
    
            // تحقق إذا كان المنتج موجودًا مسبقًا في المفضلة
            $existingFavorite = DB::table('favorites')
                ->where('subcategory_id', $subcategoryId)
                ->where('user_id', $userId)
                ->first();
    
            if ($existingFavorite) {
                return response()->json(['message' => 'المنتج موجود بالفعل في المفضلة']);
            }
    
            // أضف المنتج إلى المفضلة
            DB::table('favorites')->insert([
                'subcategory_id' => $subcategoryId,
                'user_id' => $userId,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
    
            return response()->json(['message' => 'تم إضافة المنتج إلى المفضلة بنجاح']);
        }
    
        return response()->json(['error' => 'يرجى تسجيل الدخول لإضافة المنتج إلى المفضلة'], 401);
    }
    

    public function removeWishlist($subcategoryId)
{
    if (Auth::check()) {
        $userId = Auth::user()->id;

        // تحقق إذا كان المنتج موجودًا في المفضلة
        $existingFavorite = DB::table('favorites')
            ->where('subcategory_id', $subcategoryId)
            ->where('user_id', $userId)
            ->first();

        if (!$existingFavorite) {
            return response()->json(['message' => 'The item is not in your favorites.']);
        }

        // حذف المنتج من المفضلة
        DB::table('favorites')
            ->where('subcategory_id', $subcategoryId)
            ->where('user_id', $userId)
            ->delete();

        return response()->json(['message' => 'The item has been removed from your favorites.']);
    }

    return response()->json(['error' => 'Please login to remove items from your favorites.'], 401);
}



public function showFavorites()
{
    if (Auth::check()) {
        $userId = Auth::user()->id;

        // جلب العناصر المفضلة للمستخدم
        $favorites = DB::table('favorites')
            ->join('sub_categories', 'favorites.subcategory_id', '=', 'sub_categories.id')
            ->where('favorites.user_id', $userId)
            ->select('sub_categories.id', 'sub_categories.name', 'sub_categories.description', 'sub_categories.photo')
            ->get();

        return view('favorite.index', compact('favorites'));
    }

    return redirect()->route('login')->with('error', 'يرجى تسجيل الدخول لعرض العناصر المفضلة.');
}




}
