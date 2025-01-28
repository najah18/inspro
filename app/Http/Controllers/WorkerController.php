<?php

namespace App\Http\Controllers;

use App\Models\Worker;
use App\Models\WorkerPayment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class WorkerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $workers = Worker::all();
        return view('admin.workers.index', compact('workers'));
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.workers.create');
    }
    
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:workers,email',
            'salary'=>'required',
            'phone' => 'required|string|max:15',
            'identity_image' => 'required|image|mimes:jpg,png,jpeg|max:2048',
            'contract_file' => 'required|mimes:pdf|max:2048',
        ]);
    
        // تخزين الملفات
        if ($request->hasFile('identity_image')) {
            $data['identity_image'] = $request->file('identity_image')->store('identity_images', 'public');
        }
        if ($request->hasFile('contract_file')) {
            $data['contract_file'] = $request->file('contract_file')->store('contracts', 'public');
        }
    
        Worker::create($data);
    
        return redirect()->route('admin.workers.index')->with('success', 'Worker added successfully!');
    }
    


    /**
     * Display the specified resource.
     */
    public function show(Worker $worker)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    // عرض نموذج التعديل مع البيانات القديمة
    public function edit($id)
    {
        // جلب العامل بناءً على الـ id
        $worker = Worker::findOrFail($id);
        
        // إرسال العامل إلى صفحة التعديل
        return view('admin.workers.edit', compact('worker'));
    }

        // تحديث بيانات العامل
        public function update(Request $request, $id)
    {
        $worker = Worker::findOrFail($id);

        // تحقق من وجود صورة جديدة وتحديثها
        if ($request->hasFile('identity_image')) {
            // حذف الصورة القديمة إذا كانت موجودة
            if ($worker->identity_image) {
                Storage::delete('public/' . $worker->identity_image);
            }

            // رفع الصورة الجديدة
            $path = $request->file('identity_image')->store('workers/identity_images', 'public');
            $worker->identity_image = $path;
        }

        // تحقق من وجود ملف عقد جديد وتحديثه
        if ($request->hasFile('contract_file')) {
            // حذف العقد القديم إذا كان موجودًا
            if ($worker->contract_file) {
                Storage::delete('public/' . $worker->contract_file);
            }

            // رفع العقد الجديد
            $path = $request->file('contract_file')->store('workers/contracts', 'public');
            $worker->contract_file = $path;
        }

        // تحديث بقية البيانات
        $worker->name = $request->name;
        $worker->email = $request->email;
        $worker->phone = $request->phone;
        $worker->salary = $request->salary;

        // حفظ التعديلات
        $worker->save();

        return redirect()->route('admin.workers.index')->with('success', 'Worker updated successfully');
    }
    
        // حذف العامل
        public function destroy($id)
        {
            $worker = Worker::findOrFail($id);
            $worker->delete();
            return redirect()->route('admin.workers.index')->with('success', 'Worker deleted successfully');
        }










        // payment


 // عرض المدفوعات الخاصة بالعامل
            public function showPayments($workerId)
            {
                $worker = Worker::findOrFail($workerId);
                $payments = WorkerPayment::where('worker_id', $workerId)->get();
        
                return view('admin.workers.payments', compact('worker', 'payments'));
            }
        
            // عرض نموذج إضافة معاملة جديدة
            public function addPaymentForm($workerId)
            {
                $worker = Worker::findOrFail($workerId);
                return view('admin.workers.add-payment', compact('worker'));
            }
        
            // تخزين المعاملة الجديدة
            public function storePayment(Request $request, $workerId)
            {
                $request->validate([
                    'type' => 'required|in:salary,advance,bonus',
                    'amount' => 'required|numeric',
                    'payment_date' => 'required|date',
                    'notes' => 'nullable|string',
                ]);
        
                WorkerPayment::create([
                    'worker_id' => $workerId,
                    'type' => $request->type,
                    'amount' => $request->amount,
                    'payment_date' => $request->payment_date,
                    'notes' => $request->notes,
                ]);
        
                return redirect()->route('admin.workers.payments', $workerId)->with('success', 'Payment added successfully.');
            }

        
        

}
