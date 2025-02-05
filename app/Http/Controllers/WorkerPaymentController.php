<?php

namespace App\Http\Controllers;

use App\Models\WorkerPayment;
use Illuminate\Http\Request;

class WorkerPaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */

//filter by date
     public function filterByDate(Request $request)
     {
         $start_date = $request->input('start_date');
         $end_date = $request->input('end_date');
 
         // إذا تم توفير التاريخين، نقوم بتصفية المدفوعات
         $payments = WorkerPayment::with('worker')
             ->whereBetween('payment_date', [$start_date, $end_date])
             ->get();
 
         return view('admin.payments.index', compact('payments', 'start_date', 'end_date'));
     }


    // دالة لعرض جميع المدفوعات
    public function index()
    {
        // جلب جميع المدفوعات مع بيانات الموظف المرتبط بها
        $payments = WorkerPayment::with('worker')->get();
        return view('admin.payments.index', compact('payments')); // تحميل الصفحة وعرض المدفوعات
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(WorkerPayment $workerPayment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $payment = WorkerPayment::findOrFail($id);
        return view('admin.payments.edit', compact('payment'));
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $payment = WorkerPayment::findOrFail($id);
        
        $request->validate([
            'type' => 'required|string|max:255',
            'amount' => 'required|numeric|min:0',
            'payment_date' => 'required|date',
            'notes' => 'nullable|string',
        ]);
    
        $payment->update([
            'type' => $request->type,
            'amount' => $request->amount,
            'payment_date' => $request->payment_date,
            'notes' => $request->notes,
        ]);
    
        return redirect()->route('admin.workers.payments', $payment->worker_id)->with('success', 'Payment updated successfully.');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(WorkerPayment $workerPayment)
    {
        //
    }
}
