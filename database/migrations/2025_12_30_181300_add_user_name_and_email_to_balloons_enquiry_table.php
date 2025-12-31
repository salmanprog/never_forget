<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUserNameAndEmailToBalloonsEnquiryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('balloons_enquiry', function (Blueprint $table) {
            $table->string('user_name', 100);
            $table->string('email', 150)->unique();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('balloons_enquiry', function (Blueprint $table) {
            //
        });
    }
}
