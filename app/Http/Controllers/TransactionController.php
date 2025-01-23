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
            'price' => $subcategory->price,
            'date' => $request->date,
        ]);
    
        return redirect()->route('admin.transactions.index')->with('success', 'Transaction added successfully.');
    }
    


}
