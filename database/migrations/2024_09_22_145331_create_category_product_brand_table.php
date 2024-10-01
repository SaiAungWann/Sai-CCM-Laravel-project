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
        Schema::create('category_product_brnad', function (Blueprint $table) {
            $table->primary(['category_id', 'product_brand_id']);
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('product_brand_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('category_brnad');
    }
};
