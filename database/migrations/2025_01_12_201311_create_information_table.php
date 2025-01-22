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
        Schema::create('information', function (Blueprint $table) {
            $table->id();
            $table->string('logo')->nullable();
            $table->string('facebook_link')->nullable();
            $table->string('instagram_link')->nullable();
            $table->string('tiktok_link')->nullable();
            $table->string('youtube_link')->nullable();
            $table->string('linkedin_link')->nullable();
            $table->string('threads_link')->nullable();
            $table->text('small_details')->nullable();
            $table->text('details')->nullable();
            $table->string('address_1')->nullable();
            $table->string('address_2')->nullable();
            $table->text('map_link')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('whatsapp_number')->nullable();
            $table->string('email')->nullable();
            $table->integer('videos_nb')->nullable();
            $table->integer('photos_nb')->nullable();
            $table->integer('contents_nb')->nullable();
            $table->integer('website_nb')->nullable();
            $table->string('work_link')->nullable();



            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('information');
    }
};
