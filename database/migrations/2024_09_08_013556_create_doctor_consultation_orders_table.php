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
        Schema::create('doctor_consultation_orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('doctor_id')->nullable();
            $table->unsignedBigInteger('doctor_type_id')->nullable();
            $table->string('order_number')->unique();
            $table->string('name', 50);
            $table->string('email', 100);
            $table->string('phone_number', 12);
            $table->text('instructions')->nullable();
            $table->string('payment_method', 50)->nullable();
            $table->enum('payment_status', ['Pending', 'Completed'])->default('Pending');
            $table->string('transaction_id')->nullable();
            $table->string('doctor_name', 50)->nullable();
            $table->string('doctor_type', 75)->nullable();
            $table->string('doctor_image')->nullable();
            $table->string('doctor_qualification')->nullable();
            $table->decimal('doctor_experience', 3, 1)->nullable(); 
            $table->decimal('amount_paid', 8, 2)->default(0.00);
            $table->string('status', 50)->nullable();
            $table->timestamps();

            
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
            $table->foreign('doctor_id')->references('id')->on('doctors')->onDelete('set null');
            $table->foreign('doctor_type_id')->references('id')->on('doctor_types')->onDelete('set null');

            // Adding indexes
            $table->index('user_id');
            $table->index('doctor_id');
            $table->index('doctor_type_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doctor_consultation_orders');
    }
};
