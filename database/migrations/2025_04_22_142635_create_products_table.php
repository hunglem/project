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
            $table->string('name')->unique();
            $table->text('description')->nullable();
            $table->integer('amount')->default(1); // Corrected from `int` to `integer`
            $table->timestamps(); // Add timestamps if needed
            $table->string('image_url')->nullable();
            $foreignKey = $table->foreignId('product_category_id')->constrained('product_category')->onDelete('cascade');
            $foreignKey = $table->foreignId('product_brand_id')->constrained('product_brand')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products'); // Ensure the table is dropped correctly
    }
};
