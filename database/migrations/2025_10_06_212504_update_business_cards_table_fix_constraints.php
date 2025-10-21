<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateBusinessCardsTableFixConstraints extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('business_cards', function (Blueprint $table) {
            // Make template_id nullable (for uploaded designs)
            $table->foreignId('template_id')->nullable()->change();
            
            // Make category_id nullable (for uploaded designs)
            $table->foreignId('category_id')->nullable()->change();
            
            // Add missing color fields
            $table->string('text_color')->nullable()->after('corner_style');
            $table->string('background_color')->nullable()->after('text_color');
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
            // Remove color fields
            $table->dropColumn(['text_color', 'background_color']);
            
            // Make template_id and category_id required again
            $table->foreignId('template_id')->nullable(false)->change();
            $table->foreignId('category_id')->nullable(false)->change();
        });
    }
}