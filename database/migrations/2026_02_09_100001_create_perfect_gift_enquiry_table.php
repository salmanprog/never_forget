<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePerfectGiftEnquiryTable extends Migration
{
    public function up()
    {
        Schema::create('perfect_gift_enquiry', function (Blueprint $table) {
            $table->id();
            $table->text('message')->nullable();
            $table->text('phone')->nullable();
            $table->integer('is_submitted')->default(0);
            $table->string('user_name', 100)->nullable();
            $table->string('email', 150)->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('perfect_gift_enquiry');
        
    }
}
