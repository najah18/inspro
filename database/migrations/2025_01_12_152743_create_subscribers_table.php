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
        Schema::create('subscribers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->string('photo')->nullable();
            $table->string('video')->nullable();
            $table->unsignedBigInteger('subscriber_category_id');
            $table->timestamps();

            $table->foreign('subscriber_category_id')->references('id')->on('subscriber_categories')->onDelete('cascade');

        });
        

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subscribers');
    }
};
