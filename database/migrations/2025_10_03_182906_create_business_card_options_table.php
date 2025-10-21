<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBusinessCardOptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('business_card_options', function (Blueprint $table) {
            $table->id();
            $table->string('option_type'); // paper_stock, quantity, corner_style, etc.
            $table->string('option_key'); // matte, glossy, 100, 200, rounded, standard
            $table->string('name'); // Display name
            $table->text('description')->nullable();
            $table->decimal('price_modifier', 8, 2)->default(0); // Additional cost or discount
            $table->boolean('is_active')->default(true);
            $table->integer('sort_order')->default(0);
            $table->timestamps();
            
            $table->index(['option_type', 'is_active']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('business_card_options');
    }
}