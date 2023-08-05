<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('courses', function (Blueprint $table) {
            $table->foreign('category_id')->references('id')->on('course_categories');
            $table->foreign('type_id')->references('id')->on('course_types');
            $table->foreign('status_id')->references('id')->on('course_statuses');
        });

        Schema::table('course_subcategories', function (Blueprint $table) {
            $table->foreign('category_id')->references('id')->on('course_categories');
            $table->foreign('user_id')->references('id')->on('users');
        });

        Schema::table('course_subcategories_pivot', function (Blueprint $table) {
            $table->foreign('course_id')->references('id')->on('courses');
            $table->foreign('subcategory_id')->references('id')->on('course_subcategories');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('courses', function (Blueprint $table) {
            $table->dropForeign(['category_id']);
            $table->dropForeign(['type_id']);
            $table->dropForeign(['status_id']);
        });

        Schema::table('course_subcategories', function (Blueprint $table) {
            $table->dropForeign(['category_id']);
            $table->dropForeign(['user_id']);
        });

        Schema::table('course_subcategories_pivot', function (Blueprint $table) {
            $table->dropForeign(['course_id']);
            $table->dropForeign(['subcategory_id']);
        });
    }
};
