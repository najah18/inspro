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
        Schema::create('featured_services', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // اسم الخدمة
            $table->string('image'); // مسار الصورة
            $table->decimal('price', 8, 2); // السعر (8 أرقام كحد أقصى، 2 منها بعد الفاصلة)
            $table->timestamps(); // created_at و updated_at
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('featured_services');
    }
};
