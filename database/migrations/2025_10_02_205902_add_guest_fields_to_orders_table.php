<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddGuestFieldsToOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->string('guest_email')->nullable()->after('customer_id');
            $table->string('guest_first_name')->nullable()->after('guest_email');
            $table->string('guest_last_name')->nullable()->after('guest_first_name');
            $table->string('guest_phone')->nullable()->after('guest_last_name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn(['guest_email', 'guest_first_name', 'guest_last_name', 'guest_phone']);
        });
    }
}
