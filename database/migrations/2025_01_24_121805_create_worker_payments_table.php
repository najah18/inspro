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
        Schema::create('worker_payments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('worker_id'); // العلاقة مع جدول الموظفين
            $table->enum('type', ['salary', 'advance', 'bonus']); // نوع الدفع
            $table->double('amount'); // المبلغ المدفوع
            $table->date('payment_date'); // تاريخ الدفع
            $table->text('notes')->nullable(); // ملاحظات إضافية
            $table->timestamps();

            // مفتاح أجنبي للربط مع جدول العمال
            $table->foreign('worker_id')->references('id')->on('workers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('worker_payments');
    }
};
