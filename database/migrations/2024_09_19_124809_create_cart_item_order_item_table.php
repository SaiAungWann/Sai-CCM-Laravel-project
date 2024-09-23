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
        Schema::create('cart_item_order_item', function (Blueprint $table) {
            $table->primary(['cart_item_id', 'order_item_id']);
            $table->unsignedBigInteger('cart_item_id');
            $table->unsignedBigInteger('order_item_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cart_item_order_item');
    }
};
