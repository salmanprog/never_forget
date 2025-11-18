<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBusinessCardElementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('business_card_elements', function (Blueprint $table) {
            $table->id();
            $table->foreignId('template_id')->constrained('business_card_templates')->onDelete('cascade');
            $table->string('element_type'); // text, image, logo, qr_code, shape
            $table->string('element_name'); // company_name, phone, email, etc.
            $table->json('position'); // x, y coordinates
            $table->json('size'); // width, height
            $table->json('style'); // font, color, alignment, etc.
            $table->text('default_text')->nullable();
            $table->boolean('is_editable')->default(true);
            $table->boolean('is_required')->default(false);
            $table->integer('z_index')->default(0);
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
        Schema::dropIfExists('business_card_elements');
    }
}