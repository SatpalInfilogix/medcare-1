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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('primary_category_id')->nullable();
            $table->unsignedBigInteger('category_id')->nullable();
            $table->unsignedBigInteger('subcategory_id')->nullable();
            $table->string('name');
            $table->string('image');
            $table->text('description');
            $table->timestamps();

            $table->foreign('primary_category_id')->references('id')->on('primary_categories')->onDelete('cascade');;
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');;
            $table->foreign('subcategory_id')->references('id')->on('sub_categories')->onDelete('cascade');;
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
