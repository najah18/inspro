<?php

namespace App\Http\Controllers;

use App\Models\InvoiceCategory;
use Illuminate\Http\Request;

class InvoiceCategoryController extends Controller
{
    public function index()
    {
        $categories = InvoiceCategory::all();
        return view('admin.invoicecategories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.invoicecategories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_name' => 'required|string|max:255|unique:invoice_categories,category_name',
        ]);

        InvoiceCategory::create($request->only('category_name'));

        return redirect()->route('admin.invoicecategories.index')->with('success', 'Category added successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(InvoiceCategory $invoicecategory)
    {
        return view('admin.invoicecategories.edit', compact('invoicecategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, InvoiceCategory $invoicecategory)
    {
        $request->validate([
            'category_name' => 'required|string|max:255|unique:invoice_categories,category_name,' . $invoicecategory->id,
        ]);

        $invoicecategory->update($request->only('category_name'));

        return redirect()->route('admin.invoicecategories.index')->with('success', 'Category updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(InvoiceCategory $invoicecategory)
    {
        $invoicecategory->delete();

        return redirect()->route('admin.invoicecategories.index')->with('success', 'Category deleted successfully.');
    }
}
