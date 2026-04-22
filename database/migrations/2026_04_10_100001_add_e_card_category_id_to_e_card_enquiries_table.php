<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('e_card_enquiries', function (Blueprint $table) {
            $table->unsignedBigInteger('e_card_category_id')->nullable()->after('user_id');
            $table->foreign('e_card_category_id')->references('id')->on('e_card_categories')->nullOnDelete();
        });
    }

    public function down(): void
    {
        Schema::table('e_card_enquiries', function (Blueprint $table) {
            $table->dropForeign(['e_card_category_id']);
            $table->dropColumn('e_card_category_id');
        });
    }
};
