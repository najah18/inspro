<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
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

        return view('admin.subcategories.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'photo' => 'nullable|image|mimes:jpg,png,jpeg,svg|max:2048',
            'price' => 'nullable|numeric',
            'category_id' => 'required|exists:categories,id',
        ]);
    
        // إنشاء الفئة الفرعية
        $subCategory = SubCategory::create([
            'name' => $validatedData['name'],
            'description' => $validatedData['description'] ?? null,
            'price' => $validatedData['price'] ?? null,
            'category_id' => $validatedData['category_id'],
        ]);
    
        // التحقق مما إذا كان هناك صورة مرفوعة
        if ($request->hasFile('photo')) {
            $pathToFile = $request->file('photo')->getPathname();
            $subCategory->addMedia($pathToFile)->toMediaCollection('sub_categories');
        }
    
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
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'photo' => 'nullable|image',
            'category_id' => 'required',
        ]);
    
        $subCategory = SubCategory::findOrFail($id);
    
        $subCategory->name = $request->name;
        $subCategory->description = $request->description;
        $subCategory->price = $request->price;
        $subCategory->category_id = $request->category_id;
    
        // التحقق من رفع صورة جديدة
        if ($request->hasFile('photo')) {
            // حذف الصورة القديمة إذا كانت موجودة في Media Library
            if ($subCategory->getFirstMedia('subcategories')) {
                $subCategory->getFirstMedia('subcategories')->delete();
            }
    
            // إضافة الصورة الجديدة إلى Media Library
            $pathToFile = $request->file('photo')->getPathname(); // الحصول على المسار الفعلي للصورة
            $subCategory->addMedia($pathToFile)->toMediaCollection('subcategories'); // إضافة الصورة إلى Media Collection
        }
    
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
            Storage::delete('public/'.$subCategory->photo);
        }

        // حذف القسم الفرعي
        $subCategory->delete();

        return redirect()->route('subcategories.index')->with('success', 'Subcategory deleted successfully!');
    }
}
