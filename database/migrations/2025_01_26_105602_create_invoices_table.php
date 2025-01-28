<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->string('invoice_number')->unique();
            $table->string('invoice_name');
            $table->date('invoice_date');
            $table->string('file_path'); // لحفظ مسار الملف
            $table->unsignedBigInteger('invoice_category_id'); // مفتاح أجنبي
            $table->timestamps();
    
            // إنشاء العلاقة
            $table->foreign('invoice_category_id')
                  ->references('id')
                  ->on('invoice_categories')
                  ->onDelete('cascade');
        });
    }
    
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
