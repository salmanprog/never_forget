<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBusinessCardOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('business_card_orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('cascade');
            $table->string('order_number')->unique();
            $table->string('paper_stock');
            $table->string('corner_style');
            $table->integer('quantity');
            $table->json('upload_files'); // Store file paths
            $table->json('options_data'); // Store any additional options
            $table->decimal('base_price', 10, 2);
            $table->decimal('total_price', 10, 2);
            $table->string('status')->default('pending'); // pending, processing, ready, shipped, completed
            $table->text('notes')->nullable();
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
        Schema::dropIfExists('business_card_orders');
    }
}