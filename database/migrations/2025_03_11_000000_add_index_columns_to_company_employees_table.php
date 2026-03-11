<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIndexColumnsToCompanyEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     * Adds columns to match index.blade.php headers exactly.
     */
    public function up()
    {
        Schema::table('company_employees', function (Blueprint $table) {
            $table->string('department')->nullable();
            $table->string('employee_id')->nullable();
            $table->string('job_title')->nullable();
            $table->date('hire_date')->nullable();
            $table->string('employment_status')->nullable();
            $table->string('shipping_address')->nullable();
            $table->string('favorite_color')->nullable();
            $table->string('hobbies')->nullable();
            $table->string('dietry_restriction')->nullable();
            $table->string('occasion')->nullable();
            $table->string('payment_method')->nullable();
            $table->string('delivery_status')->nullable();
        });
    }

    public function down()
    {
        Schema::table('company_employees', function (Blueprint $table) {
            $table->dropColumn([
                'department', 'employee_id', 'job_title', 'hire_date', 'employment_status',
                'shipping_address', 'favorite_color', 'hobbies', 'dietry_restriction',
                'occasion', 'payment_method', 'delivery_status'
            ]);
        });
    }
}
