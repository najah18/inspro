<?php

namespace App\Http\Controllers;

use App\Models\Income;
use Illuminate\Http\Request;

class IncomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.incomes.create');
    }

    /**
     * Store a newly created resource in storage.
     */

    
        public function store(Request $request)
        {
            $request->validate([
                'name' => 'required|string|max:255',
                'description' => 'nullable|string',
                'price' => 'required|numeric',
                'date' => 'required|date',
                'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            ]);
    
            // إنشاء سجل جديد
            $income = Income::create($request->only('name', 'description', 'price', 'date'));
    
            // رفع الصورة باستخدام مكتبة Spatie
            if ($request->hasFile('image')) {
                $income->addMedia($request->file('image'))
                      ->toMediaCollection('incomes');
            }
    
            return redirect()->route('admin.transactions.index')->with('success', 'Income added successfully!');
        }
    
    

    /**
     * Display the specified resource.
     */
    public function show(Income $income)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // العثور على الدخل بناءً على المعرف
        $income = Income::findOrFail($id);
    
        // إرجاع العرض مع الدخل
        return view('admin.incomes.edit', compact('income'));
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'date' => 'required|date',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        $income = Income::findOrFail($id);
        $income->update($request->only('name', 'description', 'price', 'date'));

        if ($request->hasFile('image')) {
            // حذف الصورة القديمة
            $income->clearMediaCollection('incomes');
            // رفع الصورة الجديدة
            $income->addMedia($request->file('image'))
                  ->toMediaCollection('incomes');
        }

    return redirect()->route('admin.transactions.index')->with('success', 'Income updated successfully!');
}



    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Find and delete the income record
        $income = Income::findOrFail($id);
        $income->delete();
    
        // Redirect with success message
        return redirect()->route('admin.transactions.index')->with('success', 'Income deleted successfully!');
    }
    
}
