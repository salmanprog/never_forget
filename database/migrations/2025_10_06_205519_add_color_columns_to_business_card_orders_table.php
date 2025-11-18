<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColorColumnsToBusinessCardOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('business_card_orders', function (Blueprint $table) {
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
        Schema::table('business_card_orders', function (Blueprint $table) {
            $table->dropColumn(['text_color', 'background_color']);
        });
    }
}
