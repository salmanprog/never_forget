<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (Schema::hasTable('balloons_category') && !Schema::hasColumn('balloons_category', 'sort_order')) {
            Schema::table('balloons_category', function (Blueprint $table) {
                $table->unsignedSmallInteger('sort_order')->default(0)->after('description');
                $table->string('status')->default('1')->after('sort_order');
            });
        }

        if (Schema::hasTable('perfect_gift_category') && !Schema::hasColumn('perfect_gift_category', 'status')) {
            Schema::table('perfect_gift_category', function (Blueprint $table) {
                $table->string('status')->default('1')->after('sort_order');
            });
        }

        if (Schema::hasTable('e_card_categories') && !Schema::hasColumn('e_card_categories', 'status')) {
            Schema::table('e_card_categories', function (Blueprint $table) {
                $table->string('status')->default('1')->after('sort_order');
            });
        }
    }

    public function down(): void
    {
        if (Schema::hasColumn('balloons_category', 'sort_order')) {
            Schema::table('balloons_category', function (Blueprint $table) {
                $table->dropColumn(['sort_order', 'status']);
            });
        }

        if (Schema::hasColumn('perfect_gift_category', 'status')) {
            Schema::table('perfect_gift_category', function (Blueprint $table) {
                $table->dropColumn('status');
            });
        }

        if (Schema::hasColumn('e_card_categories', 'status')) {
            Schema::table('e_card_categories', function (Blueprint $table) {
                $table->dropColumn('status');
            });
        }
    }
};
