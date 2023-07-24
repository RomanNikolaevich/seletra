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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('link')->nullable();
            $table->text('description')->nullable();
            $table->unsignedBigInteger('category_id')->default(1);
            $table->unsignedBigInteger('type_id')->default(1);
            $table->unsignedBigInteger('status_id')->default(1);
            $table->boolean('favorites')->default(0);
            $table->dateTime('completion_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
