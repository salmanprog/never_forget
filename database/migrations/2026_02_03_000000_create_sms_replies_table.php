<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSmsRepliesTable extends Migration
{
    public function up()
    {
        Schema::create('sms_replies', function (Blueprint $table) {
            $table->id();
            $table->string('from_number');       // User's phone (From)
            $table->string('to_number')->nullable(); // Our Twilio number (To)
            $table->text('body');
            $table->string('twilio_message_sid')->nullable();
            $table->unsignedBigInteger('sms_log_id')->nullable(); // Link to original sent message if matched
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('sms_replies');
    }
}
