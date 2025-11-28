<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notifications', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('module')->nullable();
            $table->unsignedBigInteger('module_id')->nullable();
            $table->string('module_slug')->nullable();
            $table->string('reference_module')->nullable();
            $table->unsignedBigInteger('reference_id')->nullable();
            $table->string('reference_slug')->nullable();
            $table->string('title');
            $table->text('description')->nullable();
            $table->boolean('is_read')->default(false);
            $table->boolean('is_view')->default(false);
            $table->timestamps();
            
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->index(['user_id', 'is_read']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('notifications');
    }
}
