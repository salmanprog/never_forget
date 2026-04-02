<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('greetings_appreciation_enquiry_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->uuid('guest_token')->nullable();
            $table->unsignedBigInteger('greetings_appreciation_category_id');
            $table->unsignedBigInteger('enquiry_id')->nullable();
            $table->unsignedInteger('quantity')->default(1);
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('greetings_appreciation_category_id', 'ga_items_category_fk')
                ->references('id')->on('greetings_appreciation_category')->onDelete('cascade');
            $table->foreign('enquiry_id', 'ga_items_enquiry_fk')
                ->references('id')->on('greetings_appreciation')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('greetings_appreciation_enquiry_items');
    }
};
