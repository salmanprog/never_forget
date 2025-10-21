<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBusinessCardTemplatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('business_card_templates', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->foreignId('category_id')->constrained('business_card_categories')->onDelete('cascade');
            $table->string('preview_image');
            $table->string('background_image')->nullable();
            $table->string('background_color')->default('#ffffff');
            $table->json('template_data'); // JSON with element positions, fonts, colors
            $table->json('available_colors'); // Array of available color schemes
            $table->json('available_fonts'); // Array of available fonts
            $table->boolean('is_premium')->default(false);
            $table->boolean('is_active')->default(true);
            $table->integer('sort_order')->default(0);
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
        Schema::dropIfExists('business_card_templates');
    }
}