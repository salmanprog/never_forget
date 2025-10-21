<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserBusinessCardDesignsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_business_card_designs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('business_card_id')->constrained()->onDelete('cascade');
            $table->string('design_name');
            $table->json('front_design_data'); // Complete front design JSON
            $table->json('back_design_data')->nullable(); // Complete back design JSON
            $table->string('preview_image')->nullable();
            $table->boolean('is_favorite')->default(false);
            $table->timestamp('last_modified')->nullable();
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
        Schema::dropIfExists('user_business_card_designs');
    }
}