<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddGiftingColumnsToCompanyEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     * Adds all template columns (Contact Type through Notes) for bulk upload / list display.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('company_employees', function (Blueprint $table) {
            $table->string('client_status')->nullable();
            $table->string('client_since')->nullable();
            $table->string('budget_range')->nullable();
            $table->string('gift_preferences')->nullable();
            $table->string('division')->nullable();
            $table->date('gift_send_date')->nullable();
            $table->string('mailing_address')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('zip')->nullable();
            $table->string('work_address_line_1')->nullable();
            $table->string('address_line_2')->nullable();
            $table->string('contact_company')->nullable();
            $table->string('contact_title')->nullable();
            $table->date('anniversary_date')->nullable();
            $table->date('work_anniversary_date')->nullable();
            $table->string('tracking_number')->nullable();
            $table->text('delivery_notes')->nullable();
            $table->string('order_id')->nullable();
            $table->string('order_status')->nullable();
            $table->text('notes')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('company_employees', function (Blueprint $table) {
            $table->dropColumn([
                'client_status', 'client_since', 'budget_range', 'gift_preferences',
                'division', 'gift_send_date', 'mailing_address', 'city', 'state', 'zip',
                'work_address_line_1', 'address_line_2', 'contact_company', 'contact_title',
                'anniversary_date', 'work_anniversary_date', 'tracking_number', 'delivery_notes',
                'order_id', 'order_status', 'notes'
            ]);
        });
    }
}
