<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePerfectGiftEnquiryItemsTable extends Migration
{
    public function up()
    {
        Schema::create('perfect_gift_enquiry_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->uuid('guest_token')->nullable();
            $table->unsignedBigInteger('perfect_gift_id');
            $table->unsignedBigInteger('enquiry_id')->nullable();
            $table->integer('quantity')->default(0);
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('perfect_gift_id')->references('id')->on('perfect_gift_category')->onDelete('cascade');
            $table->foreign('enquiry_id')->references('id')->on('perfect_gift_enquiry')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('perfect_gift_enquiry_items');
        
    }
}
