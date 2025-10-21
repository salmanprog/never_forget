<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyBusinessCardsTableMakeTemplateNullable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('business_cards', function (Blueprint $table) {
            $table->foreignId('template_id')->nullable()->change();
            $table->foreignId('category_id')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('business_cards', function (Blueprint $table) {
            $table-> droppingColums(['template_id', 'category_id']);
            $table->foreignId('template_id')->constrained('business_card_templates')->onDelete('cascade');
            $table->foreignId('category_id')->constrained('business_card_categories')->onDelete('cascade');
        });
    }
}
