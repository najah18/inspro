<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::all();

        return view('admin.users.index' , compact('users'));
    }



    public function update(Request $request, User $user)
{
    // التحقق من وجود قيمة في 'adminstration_level'
    $request->validate([
        'adminstration_level' => 'required|integer|min:0|max:2', // تحقق من أنها قيمة صحيحة ضمن النطاق
    ], [
        'adminstration_level.required' => 'الرجاء اختيار نوع المستخدم قبل التعديل.', // رسالة مخصصة
        'adminstration_level.integer' => 'القيمة المختارة غير صحيحة.',
        'adminstration_level.min' => 'القيمة المختارة غير صحيحة.',
        'adminstration_level.max' => 'القيمة المختارة غير صحيحة.',
    ]);

    // تحديث نوع المستخدم
    $user->adminstration_level = $request->adminstration_level;
    $user->save();

    session()->flash('flash_message','تم تعديل صلاحيات المستخدم بنجاح');
     
    return redirect(route('users.index'));
}



    public function destroy(User $user)
    {
        $user->delete();
        session()->flash('flash_message','تم حذف المستخدم بنجاح');
        return redirect(route('users.index'));
    }
}

