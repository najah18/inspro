<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();

        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.categories.create');

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
        ]);

        // إنشاء الفئة في قاعدة البيانات
        $category = Category::create([
            'name' => $validatedData['name'],
            'description' => $validatedData['description'] ?? null,
        ]);

        // التحقق مما إذا كان هناك صورة مرفوعة
        // رفع الصورة إلى Media Library
        if ($request->hasFile('photo')) {
            $pathToFile = $request->file('photo')->getPathname(); // الحصول على المسار الفعلي للصورة
            $category->addMedia($pathToFile)->toMediaCollection('categories'); // إضافة الصورة إلى Media Collection
        }

        // إعادة التوجيه مع رسالة نجاح
        return redirect()->route('categories.index')->with('success', 'Category created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $category = Category::findOrFail($id);

        return view('admin.categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $category = Category::findOrFail($id);

        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'photo' => 'nullable|image',
        ]);
    
        $category = Category::findOrFail($id);
        $category->name = $request->name;
        $category->description = $request->description;
    
        // التحقق مما إذا كانت هناك صورة جديدة
        if ($request->hasFile('photo')) {
            // حذف الصورة القديمة إذا كانت موجودة
            if ($category->getFirstMedia('categories')) {
                $category->getFirstMedia('categories')->delete();
            }
    
            // إضافة الصورة الجديدة إلى Media Library
            $pathToFile = $request->file('photo')->getPathname(); // الحصول على المسار الفعلي للصورة
            $category->addMedia($pathToFile)->toMediaCollection('categories'); // إضافة الصورة إلى Media Collection
        }
    
        $category->save();
    
        return redirect()->route('categories.index')->with('success', 'Category updated successfully!');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $category = Category::findOrFail($id);

        if ($category->photo) {
            Storage::delete('public/'.$category->photo);
        }

        $category->delete();

        return redirect()->route('categories.index')->with('success', 'Category deleted successfully!');
    }
}
