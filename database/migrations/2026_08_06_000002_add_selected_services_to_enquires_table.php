<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSelectedServicesToEnquiresTable extends Migration
{
    public function up()
    {
        Schema::table('enquires', function (Blueprint $table) {
            if (!Schema::hasColumn('enquires', 'selected_services')) {
                $table->longText('selected_services')->nullable()->after('message');
            }
        });
    }

    public function down()
    {
        Schema::table('enquires', function (Blueprint $table) {
            if (Schema::hasColumn('enquires', 'selected_services')) {
                $table->dropColumn('selected_services');
            }
        });
    }
}
