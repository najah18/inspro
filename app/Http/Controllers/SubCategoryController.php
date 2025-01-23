<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;


class SubCategoryController extends Controller
{

    public function showCategories()
    {
        $categories = Category::all(); // جلب جميع التصنيفات
    $subcategories = SubCategory::all(); // جلب جميع الفئات الفرعية
    return view('admin.subcategories.index', compact('categories', 'subcategories'));

    }

    public function filterByCategory($categoryId = null)
        {
            $categories = Category::all(); // جلب جميع التصنيفات
            if ($categoryId) {
                $subcategories = SubCategory::where('category_id', $categoryId)->get(); // تصفية الفئات الفرعية حسب التصنيف
            } else {
                $subcategories = SubCategory::all(); // جلب جميع الفئات الفرعية
            }
            return view('admin.subcategories.index', compact('categories', 'subcategories'));
        }

    /**
     * Display a listing of the resource.
     */
    public function index($categoryId)
    {
        // جلب الفئة المحددة
        $category = Category::findOrFail($categoryId);
        
        // جلب الأنواع الفرعية المرتبطة بالفئة
        $subcategories = $category->subcategories;
    
        return view('services.subcategories', compact('category', 'subcategories'));
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();

        return view('admin.subcategories.create' , compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'photo' => 'image|required',
            'category_id' => 'required',
        ]);
    
        $subCategory = new SubCategory;

        $subCategory->name = $request->name;
        $subCategory->description = $request->description;
        $subCategory->price = $request->price;

        // حفظ الصورة إذا تم تحميلها
        if ($request->hasFile('photo')) {
            $subCategory->photo = $request->file('photo')->store('subcategories', 'public');
        }
        
        $subCategory->category_id = $request->category_id;
        
        // حفظ القسم الفرعي
        $subCategory->save();
    


        // إعادة التوجيه مع رسالة نجاح
        return redirect()->route('subcategories.index')->with('success', 'Package added successfully!');
    }
    

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // البحث عن القسم الفرعي بناءً على المعرّف
        $subcategory = Subcategory::findOrFail($id);
    
        // عرض الصفحة مع تمرير البيانات
        return view('services.show', compact('subcategory'));
    }

    public function showadmin($id)
        {
            $subcategory = SubCategory::with('category')->findOrFail($id);
            return view('admin.subcategories.show', compact('subcategory'));
        }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $subcategory = SubCategory::findOrFail($id);
        $categories = Category::all();
    
        return view('admin.subcategories.edite', compact('subcategory', 'categories'));
    }
    
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'photo' => 'image|nullable',
            'category_id' => 'required',
        ]);
    
        $subCategory = SubCategory::findOrFail($id);
    
        $subCategory->name = $request->name;
        $subCategory->description = $request->description;
        $subCategory->price = $request->price;

    
        // تحديث الصورة إذا تم تحميلها
        if ($request->hasFile('photo')) {
            // حذف الصورة القديمة إذا وجدت
            if ($subCategory->photo) {
                Storage::delete('public/' . $subCategory->photo);
            }
            $subCategory->photo = $request->file('photo')->store('subcategories', 'public');
        }
    
        $subCategory->category_id = $request->category_id;
    
        // حفظ التعديلات
        $subCategory->save();
    
        return redirect()->route('subcategories.index')->with('success', 'Subcategory updated successfully!');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $subCategory = SubCategory::findOrFail($id);
    
        // حذف الصورة إذا وجدت
        if ($subCategory->photo) {
            Storage::delete('public/' . $subCategory->photo);
        }
    
        // حذف القسم الفرعي
        $subCategory->delete();
    
        return redirect()->route('subcategories.index')->with('success', 'Subcategory deleted successfully!');
    }
    












}
