<?php

namespace App\Http\Controllers;

use App\Models\FeaturedService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Spatie\MediaLibrary\Models\Media;


class FeaturedServiceController extends Controller
{
    // عرض جميع الخدمات المميزة
    public function index()
    {
        $services = FeaturedService::all();

        return view('admin.featured.index', compact('services'));
    }

    // عرض نموذج إضافة خدمة جديدة
    public function create()
    {
        return view('admin.featured.create');
    }

    // حفظ الخدمة الجديدة

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpg,png,jpeg,svg|max:2048',
        ]);
    
        // إنشاء الخدمة في قاعدة البيانات
        $featuredService = FeaturedService::create([
            'name' => $validatedData['name'],
            'price' => $validatedData['price'],
        ]);
    
        // التحقق مما إذا كانت هناك صورة مرفوعة
        if ($request->hasFile('image')) {
            $pathToFile = $request->file('image')->getPathname(); // الحصول على المسار الفعلي للصورة
            $featuredService->addMedia($pathToFile)->toMediaCollection('featured_services'); // إضافة الصورة إلى Media Collection
        }
    
        // إعادة التوجيه مع رسالة نجاح
        return redirect()->route('admin.featured.index')->with('success', 'Featured service created successfully!');
    }
    
    
    
    

    // عرض نموذج تعديل الخدمة
    public function edit($id)
    {
        $service = FeaturedService::findOrFail($id);

        return view('admin.featured.edit', compact('service'));
    }

    // تحديث الخدمة

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpg,png,jpeg,svg|max:2048',
        ]);
    
        // العثور على الخدمة
        $featuredService = FeaturedService::findOrFail($id);
        $featuredService->name = $validatedData['name'];
        $featuredService->price = $validatedData['price'];
    
        // التحقق مما إذا كانت هناك صورة جديدة
        if ($request->hasFile('image')) {
            // حذف الصورة القديمة إذا كانت موجودة
            if ($featuredService->getFirstMedia('featured_services')) {
                $featuredService->getFirstMedia('featured_services')->delete();
            }
    
            // إضافة الصورة الجديدة إلى Media Library
            $pathToFile = $request->file('image')->getPathname(); // الحصول على المسار الفعلي للصورة
            $featuredService->addMedia($pathToFile)->toMediaCollection('featured_services'); // إضافة الصورة إلى Media Collection
        }
    
        $featuredService->save();
    
        return redirect()->route('admin.featured.index')->with('success', 'Featured service updated successfully!');
    }
    

    // حذف الخدمة
    public function destroy($id)
    {
        $service = FeaturedService::findOrFail($id);


        // حذف الخدمة
        $service->delete();

        return redirect()->route('admin.featured.index')->with('success', 'تم حذف الخدمة بنجاح.');
    }
}
