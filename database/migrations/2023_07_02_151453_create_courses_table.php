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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('link');
            $table->text('description')->nullable();
            $table->integer('status')->default(0);
            $table->integer('type')->default(0);
            $table->boolean('favorites')->default(0);
            $table->string('image')->nullable();
            $table->dateTime('completion_at')->nullable();
            $table->integer('category_id')->default(0);
           // $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
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
