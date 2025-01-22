<?php
namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EmployeeController extends Controller
{
    // عرض جميع الموظفين
    public function index()
    {
        $employees = Employee::all();
        return view('admin.employees.index', compact('employees'));
    }

    // عرض نموذج إضافة موظف جديد
    public function create()
    {
        return view('admin.employees.create');
    }

    // تخزين بيانات الموظف في قاعدة البيانات
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'nullable',
            'photo' => 'nullable|image',
        ]);

        $employee = new Employee();
        $employee->name = $request->name;
        $employee->description = $request->description;

        // تخزين الصورة إذا تم رفعها
        if ($request->hasFile('photo')) {
            $employee->photo = $request->file('photo')->store('employees', 'public');
        }

        $employee->save();
        return redirect()->route('employees.index')->with('success', 'Employee added successfully!');
    }


        // عرض تفاصيل الموظف
        public function show($id)
        {
            $employee = Employee::findOrFail($id);
            return view('admin.employees.show', compact('employee'));
        } 

    // عرض نموذج تعديل بيانات الموظف
    public function edit($id)
    {
        $employee = Employee::findOrFail($id);
        return view('admin.employees.edit', compact('employee'));
    }

    // تحديث بيانات الموظف
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'nullable',
            'photo' => 'nullable|image',
        ]);

        $employee = Employee::findOrFail($id);
        $employee->name = $request->name;
        $employee->description = $request->description;

        // حذف الصورة القديمة إذا تم رفع صورة جديدة
        if ($request->hasFile('photo')) {
            if ($employee->photo) {
                Storage::delete('public/' . $employee->photo);
            }
            $employee->photo = $request->file('photo')->store('employees', 'public');
        }

        $employee->save();
        return redirect()->route('employees.index')->with('success', 'Employee updated successfully!');
    }

    // حذف موظف
    public function destroy($id)
    {
        $employee = Employee::findOrFail($id);

        // حذف الصورة من التخزين
        if ($employee->photo) {
            Storage::delete('public/' . $employee->photo);
        }

        $employee->delete();
        return redirect()->route('employees.index')->with('success', 'Employee deleted successfully!');
    }
}
