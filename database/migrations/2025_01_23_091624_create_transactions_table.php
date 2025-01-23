<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use function Laravel\Prompts\table;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->double('price')->nullable();
            $table->date('date');
            $table->unsignedBigInteger('subcategory_id');
            $table->timestamps();
        
            // ربط الجدول مع جدول subcategories باستخدام المفتاح الأجنبي
            $table->foreign('subcategory_id')->references('id')->on('sub_categories')->onDelete('cascade');
        });
        
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
