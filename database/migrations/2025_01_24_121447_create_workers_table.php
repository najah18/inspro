<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('workers', function (Blueprint $table) {
            $table->id(); // معرف الموظف
            $table->string('name'); // اسم الموظف
            $table->string('email')->unique(); // البريد الإلكتروني
            $table->string('phone')->nullable(); // رقم الهاتف
            $table->double('salary'); // الراتب
            $table->string('identity_image')->nullable(); // صورة الهوية
            $table->string('contract_file')->nullable(); // ملف عقد العمل
            $table->timestamps(); // الطوابع الزمنية
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('workers');
    }
};
