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
            $table->string('product_id', 50)->unique('pro_');
            $table->string('name', 20);
            $table->string('short_desc', 500);
            $table->text('description');
            $table->enum('status', ['Active', 'Inactive']);
            $table->string('price', 10)->nullable(false);
            $table->string('offer_price', 10)->nullable(true);
            $table->string('product_image', 100)->nullable(false);
            $table->string('meta_title', 100)->nullable(true);
            $table->string('meta_keywords', 300)->nullable(true);
            $table->string('meta_desc', 600)->nullable(true);
            $table->string('created_by', 50)->references('user_id')->on('users');
            $table->string('updated_by', 50)->nullable()->default(null);
            $table->string('category_id', 50)->references('id')->on('categories');
            $table->timestamps();
            $table->foreign('created_by')->references('id')->on('users');
            $table->foreign('category_id')->references('id')->on('categories');
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
