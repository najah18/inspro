<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\InvoiceCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class InvoiceController extends Controller
{

    // Display a listing of the invoices.
    public function index(Request $request)
    {
        // استرجاع التصنيفات لتعبئة الفلتر
        $categories = InvoiceCategory::all();

        // استعلام الفواتير مع فلترة حسب التصنيف والتاريخ إذا تم تحديدهم
        $invoices = Invoice::with('invoiceCategory')
            ->when($request->invoice_category, function ($query) use ($request) {
                return $query->where('invoice_category_id', $request->invoice_category);
            })
            ->when($request->start_date, function ($query) use ($request) {
                return $query->where('invoice_date', '>=', $request->start_date);
            })
            ->when($request->end_date, function ($query) use ($request) {
                return $query->where('invoice_date', '<=', $request->end_date);
            })
            ->get();

        return view('admin.invoices.index', compact('invoices', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = InvoiceCategory::all(); // استرجاع جميع التصنيفات
        return view('admin.invoices.create', compact('categories'));
    }
    

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
{
    // التحقق من صحة البيانات
    $request->validate([
        'invoice_number' => 'required|unique:invoices',
        'invoice_name' => 'required',
        'invoice_date' => 'required|date',
        'price'=>'required',
        'file' => 'nullable|file', // تأكد من نوع الملف
        'invoice_category_id' => 'required|exists:invoice_categories,id', // تحقق من أن التصنيف موجود

        
    ]);

    // رفع الملف
    if ($request->hasFile('file')) {
        // تخزين الملف في مجلد invoices داخل storage
        $filePath = $request->file('file')->store('invoices', 'public');
    }

    // حفظ الفاتورة مع المسار المعدل
    Invoice::create([
        'invoice_number' => $request->invoice_number,
        'invoice_name' => $request->invoice_name,
        'invoice_date' => $request->invoice_date,
        'price' => $request->price,
        'file_path' => $filePath,  // حفظ المسار مباشرة دون إضافة file_path/
        'invoice_category_id' => $request->invoice_category_id,
    ]);

    return redirect()->route('admin.invoices.index')->with('success', 'Invoice created successfully!');
}

    
    /**
     * Display the specified resource.
     */
    public function show(Invoice $invoice)
    {
        //
    }

    public function edit($id)
    {
        // استرجاع الفاتورة المحددة بناءً على الـ ID
        $invoice = Invoice::findOrFail($id);
    
        // استرجاع جميع التصنيفات لعرضها في القائمة المنسدلة
        $categories = InvoiceCategory::all();
    
        // عرض نموذج التحرير مع البيانات الحالية للفاتورة
        return view('admin.invoices.edit', compact('invoice', 'categories'));
    }


    public function update(Request $request, $id)
{
    // التحقق من صحة البيانات
    $request->validate([
        'invoice_number' => 'required|unique:invoices,invoice_number,' . $id,
        'invoice_name' => 'required',
        'invoice_date' => 'required|date',
        'price'=>'required',
        'file' => 'nullable|file',
        'invoice_category_id' => 'required|exists:invoice_categories,id', // تأكد من أن الاسم صحيح
    ]);

    // استرجاع الفاتورة المحددة بناءً على الـ ID
    $invoice = Invoice::findOrFail($id);

    // تحديث البيانات
    $invoice->invoice_number = $request->invoice_number;
    $invoice->invoice_name = $request->invoice_name;
    $invoice->invoice_date = $request->invoice_date;
    $invoice-> price = $request->price;
    $invoice->invoice_category_id = $request->invoice_category_id; // تأكد من أن الاسم صحيح

    // تحديث الملف إذا تم تحميل ملف جديد
    if ($request->hasFile('file')) {
        // حذف الملف القديم إذا وجد
        if ($invoice->file_path) {
            Storage::delete('public/' . $invoice->file_path);
        }
        // تخزين الملف الجديد
        $invoice->file_path = $request->file('file')->store('invoices', 'public');
    }

    // حفظ التعديلات
    $invoice->save();

    // إعادة التوجيه إلى صفحة الفواتير مع رسالة نجاح
    return redirect()->route('admin.invoices.index')->with('success', 'Invoice updated successfully!');
}
    
    
    
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $invoice = Invoice::findOrFail($id);  // العثور على الفاتورة باستخدام الـ ID
        $invoice->delete();  // حذف الفاتورة
        return redirect()->route('admin.invoices.index')->with('success', 'Invoice deleted successfully.');
    }

}
