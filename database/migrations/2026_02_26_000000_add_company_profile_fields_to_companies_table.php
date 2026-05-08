<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCompanyProfileFieldsToCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('companies', function (Blueprint $table) {
            $table->string('registration_number')->nullable()->after('name');
            $table->string('year_established')->nullable()->after('industry');
            $table->unsignedInteger('number_of_employees')->nullable()->after('year_established');
            $table->string('logo')->nullable()->after('number_of_employees');
            $table->string('primary_contact_name')->nullable()->after('logo');
            $table->string('job_title')->nullable()->after('primary_contact_name');
            $table->string('billing_address_line_1')->nullable()->after('billing_phone');
            $table->string('billing_address_line_2')->nullable()->after('billing_address_line_1');
            $table->string('city')->nullable()->after('billing_address_line_2');
            $table->string('state')->nullable()->after('city');
            $table->string('zip_code')->nullable()->after('state');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('companies', function (Blueprint $table) {
            $table->dropColumn([
                'registration_number',
                'year_established',
                'number_of_employees',
                'logo',
                'primary_contact_name',
                'job_title',
                'billing_address_line_1',
                'billing_address_line_2',
                'city',
                'state',
                'zip_code',
            ]);
        });
    }
}
