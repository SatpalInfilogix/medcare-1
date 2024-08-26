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
        Schema::create('sub_categories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('primary_category_id');
            $table->unsignedBigInteger('category_id');
            $table->string('name');
            $table->string('image')->nullable();
            $table->text('description')->nullable();
            $table->string('flag')->nullable();
            $table->timestamps();

            $table->foreign('primary_category_id')->references('id')->on('primary_categories')->onDelete('cascade');;
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');;
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sub_categories');
    }
};
