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
        Schema::create('product_reviews', function (Blueprint $table) {
            $table->id();

            $table->string('description');
            $table->string('rating'); // Consider changing type if needed (e.g., integer, decimal)

            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('customer_id'); // Correctly added

            // Foreign key constraints look good
            $table->foreign('product_id')->references('id')->on('products')->restrictOnDelete()->cascadeOnUpdate();
            $table->foreign('customer_id')->references('id')->on('customers')->restrictOnDelete()->cascadeOnUpdate();


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_reviews');
    }
};
