<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBalloonEnquiryItems extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('balloon_enquiry_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('balloon_id');
            $table->unsignedBigInteger('enquiry_id')->nullable();
            $table->integer('quantity')->default(0);
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('balloon_id')->references('id')->on('balloons_category')->onDelete('cascade');
            $table->foreign('enquiry_id')->references('id')->on('balloons_enquiry')->onDelete('cascade');
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
        Schema::dropIfExists('balloon_enquiry_items');
    }
}
