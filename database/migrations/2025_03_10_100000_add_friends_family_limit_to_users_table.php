<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFriendsFamilyLimitToUsersTable extends Migration
{
    /**
     * Run the migrations.
     * Default limit 5 for individual dashboard; upgrade sets to 10.
     */
    public function up()
    {
        if (Schema::hasTable('users') && !Schema::hasColumn('users', 'friends_family')) {
            Schema::table('users', function (Blueprint $table) {
                $table->unsignedInteger('friends_family')->default(5)->after('clients');
            });
        }
    }

    public function down()
    {
        if (Schema::hasColumn('users', 'friends_family')) {
            Schema::table('users', function (Blueprint $table) {
                $table->dropColumn('friends_family');
            });
        }
    }
}
