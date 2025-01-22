<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name'=>'admin',
            'email' => 'Insproproduction@gmail.com', // البريد الإلكتروني
            'password' => Hash::make('inspro2025@'), // كلمة المرور
            'adminstration_level' => 2, // مستوى الإدارة (تأكد من أن لديك عمود is_admin في جدول users)
        ]);

    }
}
