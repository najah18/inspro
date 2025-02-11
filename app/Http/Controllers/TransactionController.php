<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class TransactionController extends Controller
{

    public function index()
    {
        $transactions = Transaction::with('subcategory')->get();
        $total = $transactions->sum('price');
    
    // تنفيذ استعلام SQL مباشر للحصول على اسم الـ subcategory وعدد مرات استخدامه والمجموع الكلي
    $subcategories = DB::select(
        'SELECT sub_categories.name, 
                COUNT(transactions.subcategory_id) AS usage_count, 
                SUM(transactions.price) AS total_price
         FROM transactions
         JOIN sub_categories ON sub_categories.id = transactions.subcategory_id
         GROUP BY transactions.subcategory_id'
    );
    
        return view('admin.transactions.index', compact('transactions', 'total', 'subcategories'));
    }
    


    public function create(Request $request)
    {
        $categories = Category::all(); // استرجاع جميع الفئات
    
        // التحقق إذا كانت هناك فئة محددة
        $selectedCategory = $request->input('category');
        $subcategories = $selectedCategory
            ? Subcategory::where('category_id', $selectedCategory)->get()
            : collect(); // إذا لم يتم تحديد فئة، اجعل القائمة فارغة
    
        return view('admin.transactions.create', compact('categories', 'subcategories', 'selectedCategory'));
    }
    
    
    /**
     * Store a newly created transaction in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'subcategory_id' => 'required|exists:sub_categories,id',
            'date' => 'required|date',
        ]);
    
        $subcategory = Subcategory::find($request->subcategory_id);
    
        Transaction::create([
            'subcategory_id' => $subcategory->id,
            'price' => $request->price,
            'date' => $request->date,
        ]);
    
        return redirect()->route('admin.transactions.index')->with('success', 'Transaction added successfully.');
    }
    


        public function edit($id)
        {
            $transaction = Transaction::findOrFail($id);
            $subcategories = Subcategory::where('category_id', $transaction->subcategory->category_id)->get(); // جلب التصنيفات الفرعية المرتبطة بالفئة
        
            return view('admin.transactions.edit', compact('transaction', 'subcategories')); // تمرير المتغيرات إلى العرض
        }
        

    public function update(Request $request, $id)
    {
        // ✅ التحقق من صحة البيانات المدخلة
        $request->validate([
            'subcategory_id' => 'required|exists:sub_categories,id',
            'price' => 'required|numeric|min:0',
            'date' => 'required|date',
        ]);
    
        // ✅ جلب السجل المطلوب
        $transaction = Transaction::findOrFail($id);
    
        // ✅ جلب التصنيف بناءً على التصنيف الفرعي المحدد
        $subcategory = Subcategory::findOrFail($request->subcategory_id);
        $categoryName = $subcategory->category->name; // الحصول على اسم التصنيف
    
        // ✅ تحديث البيانات
        $transaction->update([
            'name' => $categoryName, // ✅ تعيين الاسم بناءً على التصنيف
            'subcategory_id' => $request->subcategory_id,
            'price' => $request->price,
            'date' => $request->date,
        ]);
    
        // ✅ إعادة التوجيه مع رسالة نجاح
        return redirect()->route('admin.transactions.index')->with('success', 'تم تحديث المعاملة بنجاح!');
    }

    public function destroy($id)
{
    // جلب السجل المطلوب
    $transaction = Transaction::findOrFail($id);

    // حذف المعاملة
    $transaction->delete();

    // إعادة التوجيه مع رسالة نجاح
    return redirect()->route('admin.transactions.index')->with('success', 'تم حذف المعاملة بنجاح!');
}

    

}
