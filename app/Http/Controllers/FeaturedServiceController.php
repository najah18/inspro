<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\FeaturedService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
        // التحقق من صحة البيانات
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'price' => 'required|numeric',
        ]);
    
        // رفع الصورة وحفظ المسار
        $imagePath = $request->file('image')->store('featured-services', 'public');
    
        // إنشاء الخدمة
        FeaturedService::create([
            'name' => $request->name,
            'image' => $imagePath,
            'price' => $request->price,
        ]);
    
        // توجيه إلى صفحة index مع رسالة نجاح
        return redirect()->route('admin.featured.index')->with('success', 'تمت إضافة الخدمة بنجاح.');
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
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'price' => 'required|numeric',
        ]);

        $service = FeaturedService::findOrFail($id);

        // إذا تم رفع صورة جديدة
        if ($request->hasFile('image')) {
            // حذف الصورة القديمة
            Storage::disk('public')->delete($service->image);
            // رفع الصورة الجديدة
            $imagePath = $request->file('image')->store('featured-services', 'public');
            $service->image = $imagePath;
        }

        // تحديث البيانات
        $service->name = $request->name;
        $service->price = $request->price;
        $service->save();

        return redirect()->route('admin.featured.index')->with('success', 'تم تحديث الخدمة بنجاح.');
    }

    // حذف الخدمة
    public function destroy($id)
    {
        $service = FeaturedService::findOrFail($id);

        // حذف الصورة من التخزين
        Storage::disk('public')->delete($service->image);

        // حذف الخدمة
        $service->delete();

        return redirect()->route('admin.featured.index')->with('success', 'تم حذف الخدمة بنجاح.');
    }
}