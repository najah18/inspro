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
      return view('admin.categories.index' , compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.categories.create' );

    }

    /**
     * Store a newly created resource in storage.
     */

        public function store(Request $request)
            {
                $validatedData = $request->validate([
                    'name' => 'required|string|max:255',
                    'description' => 'nullable|string',
                    'photo' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
                ]);

                $category = new Category();
                $category->name = $validatedData['name'];
                $category->description = $validatedData['description'] ?? null;

                if ($request->hasFile('photo')) {
                    $category->photo = $request->file('photo')->store('categories', 'public');
                }

                $category->save();

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
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'photo' => 'image|nullable',
        ]);
    
        $category = Category::findOrFail($id);
        $category->name = $request->name;
        $category->description = $request->description;
    
        if ($request->hasFile('photo')) {
            if ($category->photo) {
                Storage::delete('public/' . $category->photo);
            }
            $category->photo = $request->file('photo')->store('categories', 'public');
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
            Storage::delete('public/' . $category->photo);
        }
    
        $category->delete();
    
        return redirect()->route('categories.index')->with('success', 'Category deleted successfully!');
    }
    
}
