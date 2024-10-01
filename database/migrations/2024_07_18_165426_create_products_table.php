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
            $table->string('name');
            $table->unsignedBigInteger('product_brand_id')->nullable();
            $table->unsignedBigInteger('category_id')->nullable();
            $table->integer('price');
            $table->integer('discounted_percentage');
            $table->string('slug')->uniqid();
            $table->text('description')->nullable();
            $table->boolean("new_arrival")->nullable();
            $table->boolean("top_seller")->nullable();
            $table->string("processor")->nullable();
            $table->string("screen_size")->nullable();
            $table->string("battery")->nullable();
            $table->string("ram")->nullable();
            $table->string('storage')->nullable();
            $table->string('graphics')->nullable();
            $table->string('display')->nullable();
            $table->string('opreation_system')->nullable();
            $table->string('ports_and_connections')->nullable();
            $table->string('warranty')->nullable();
            $table->timestamps();
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
