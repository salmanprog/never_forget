<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateECardEnquiriesTable extends Migration
{
    public function up()
    {
        Schema::create('e_card_enquiries', function (Blueprint $table) {
            $table->id();
            $table->string('occasion');
            $table->string('recipient_name');
            $table->string('recipient_email_phone');
            $table->text('message')->nullable();
            $table->string('card_style')->nullable();
            $table->string('upload_logo_photo')->nullable();
            $table->date('send_date');
            $table->time('send_time');
            $table->string('physical_gift', 10)->default('No');
            $table->string('physical_gift_type')->nullable();
            $table->string('sender_name')->nullable();
            $table->string('sender_email')->nullable();
            $table->string('sender_phone')->nullable();
            $table->string('company_name')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('status', 50)->default('New Request');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('e_card_enquiries');
    }
}
