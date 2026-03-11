<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFriendFamiliesTable extends Migration
{
    public function up()
    {
        Schema::create('friend_families', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('recipient_first_name');
            $table->string('recipient_last_name');
            $table->string('relationship_with_client')->nullable();
            $table->string('email');
            $table->string('phone')->nullable();
            $table->string('occasion')->nullable();
            $table->date('occasion_date')->nullable();
            $table->string('gift_preferences')->nullable();
            $table->string('favorite_color')->nullable();
            $table->string('dietry_restrictions')->nullable();
            $table->string('budget')->nullable();
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('zip')->nullable();
            $table->date('delivery_date')->nullable();
            $table->text('delivery_note')->nullable();
            $table->text('message_with_gift')->nullable();
            $table->string('payment_method')->nullable();
            $table->string('tracking_number')->nullable();
            $table->text('notes')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('friend_families');
    }
}
