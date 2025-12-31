<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBalloonsEnquiryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('balloons_enquiry', function (Blueprint $table) {
            $table->id();
            $table->text('message')->nullable();
            $table->text('phone')->nullable();
            $table->integer('is_submitted')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('balloons_enquiry');
    }
}
