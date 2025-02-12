<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class AddSlugToMultipleTables extends Migration
{
    public function up()
    {
        $tablesWithName = ['categories', 'sub_categories', 'post_categories', 'subscriber_categories', 'subscribers'];

        foreach ($tablesWithName as $table) {
            // إضافة حقل slug إذا لم يكن موجودًا
            if (!Schema::hasColumn($table, 'slug')) {
                Schema::table($table, function (Blueprint $table) {
                    $table->string('slug')->nullable()->after('name'); // إضافة slug بعد الحقل name
                });
            }

            // توليد slug تلقائيًا للبيانات الموجودة بالفعل
            DB::statement("UPDATE $table SET slug = COALESCE(NULLIF(slug, ''), id)");

            // إضافة القيد الفريد فقط بعد التأكد من أن slug غير مكرر
            Schema::table($table, function (Blueprint $table) {
                $table->unique('slug');
            });
        }
    }
    public function down()
    {
        $allTables = ['categories', 'sub_categories', 'post_categories', 'posts', 'subscriber_categories', 'subscribers'];
    
        foreach ($allTables as $table) {
            Schema::table($table, function (Blueprint $table) {
                // حذف القيد الفريد باستخدام اسم القيد التلقائي
                $table->dropUnique("{$table}_slug_unique"); // هذا القيد سيكون تلقائيًا بشكل "table_slug_unique"
                // حذف العمود slug
                $table->dropColumn('slug');
            });
        }
    }
    
}
