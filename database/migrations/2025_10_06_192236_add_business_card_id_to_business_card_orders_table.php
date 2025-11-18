<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddBusinessCardIdToBusinessCardOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('business_card_orders', function (Blueprint $table) {
            $table->foreignId('business_card_id')->nullable()->constrained()->onDelete('cascade');
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
            $table->dropForeign(['business_card_id']);
            $table->dropColumn('business_card_id');
        });
    }
}
