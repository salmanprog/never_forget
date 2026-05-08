<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIsCompanyProfileToBillingAddressesTable extends Migration
{
    public function up()
    {
        Schema::table('billing_addresses', function (Blueprint $table) {
            $table->boolean('is_company_profile')->default(false)->after('status');
        });
    }

    public function down()
    {
        Schema::table('billing_addresses', function (Blueprint $table) {
            $table->dropColumn('is_company_profile');
        });
    }
}
