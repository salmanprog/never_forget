<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tango_enquiries', function (Blueprint $table) {
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
            $table->unsignedBigInteger('tango_category_id')->nullable();
            $table->string('status', 50)->default('New Request');
            $table->timestamps();

            $table->foreign('tango_category_id')
                ->references('id')
                ->on('tango_categories')
                ->nullOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tango_enquiries');
    }
};
