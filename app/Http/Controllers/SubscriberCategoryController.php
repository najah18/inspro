<?php

namespace App\Http\Controllers;

use App\Models\SubscriberCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SubscriberCategoryController extends Controller
{
    public function index()
    {
        $categories = SubscriberCategory::all();
        return view('admin.subscribercategory.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.subscribercategory.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('subscriber_categories', 'public');
            $validated['photo'] = $path;
        }

        SubscriberCategory::create($validated);

        return redirect()->route('admin.subscriber-categories.index')
            ->with('success', 'تم إنشاء التصنيف بنجاح');
    }

    public function show(SubscriberCategory $subscriberCategory)
    {
        return view('admin.subscribercategory.show', compact('subscriberCategory'));
    }

    public function edit(SubscriberCategory $subscriberCategory)
    {
        return view('admin.subscribercategory.edit', compact('subscriberCategory'));
    }

    public function update(Request $request, SubscriberCategory $subscriberCategory)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('photo')) {
            // حذف الصورة القديمة إذا وجدت
            if ($subscriberCategory->photo) {
                Storage::disk('public')->delete($subscriberCategory->photo);
            }
            
            $path = $request->file('photo')->store('subscriber_categories', 'public');
            $validated['photo'] = $path;
        }

        $subscriberCategory->update($validated);

        return redirect()->route('admin.subscriber-categories.index')
            ->with('success', 'تم تحديث التصنيف بنجاح');
    }

    public function destroy(SubscriberCategory $subscriberCategory)
    {
        if ($subscriberCategory->photo) {
            Storage::disk('public')->delete($subscriberCategory->photo);
        }

        $subscriberCategory->delete();

        return redirect()->route('admin.subscriber-categories.index')
            ->with('success', 'تم حذف التصنيف بنجاح');
    }
}
