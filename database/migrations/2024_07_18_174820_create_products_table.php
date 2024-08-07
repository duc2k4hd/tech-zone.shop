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
            $table->string('name', 255)->nullable();
            $table->string('code', 50)->nullable();
            $table->text('description')->nullable();
            $table->decimal('price', 10, 0)->nullable();
            $table->string('unit', 50)->nullable();
            $table->decimal('discounted_price', 10, 0)->nullable();
            $table->string('avatar', 255)->nullable();
            $table->integer('stock')->nullable();
            $table->foreignId('category_id')->constrained('categories')->onUpdate('cascade');
            $table->json('size')->nullable();
            $table->json('color')->nullable();
            $table->string('material', 255)->nullable();
            $table->string('img_path')->nullable();
            $table->json('img_arr')->nullable();
            $table->foreignId('brand_id')->constrained('brands')->onUpdate('cascade');
            $table->enum('status', ['available','out_of_stock'])->default('available');
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
