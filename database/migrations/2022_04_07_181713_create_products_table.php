<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('created_by');
            $table->string('category_id');
            $table->string('sub_category_id');
            $table->string('variations')->nullable();
            $table->string('name');
            $table->string('slug');
            $table->string('product_type')->default(0)->comment('0=Simple Product, 1= Variable Product');
            $table->string('product_price')->nullable(); 
            $table->string('short_description')->nullable();
            $table->string('description')->nullable();
            $table->string('is_special')->nullable();
            $table->string('image')->nullable();
            $table->string('related_images')->nullable();
            $table->string('related_product')->nullable();
            $table->string('status')->default(1)->comment('0=inactive,1= active,2= sold out');
            $table->string('deleted_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
