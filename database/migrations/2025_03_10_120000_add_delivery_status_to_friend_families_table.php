<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDeliveryStatusToFriendFamiliesTable extends Migration
{
    public function up()
    {
        if (Schema::hasTable('friend_families') && !Schema::hasColumn('friend_families', 'delivery_status')) {
            Schema::table('friend_families', function (Blueprint $table) {
                $table->string('delivery_status', 50)->default('pending')->after('tracking_number');
            });
        }
    }

    public function down()
    {
        if (Schema::hasColumn('friend_families', 'delivery_status')) {
            Schema::table('friend_families', function (Blueprint $table) {
                $table->dropColumn('delivery_status');
            });
        }
    }
}
