<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('greetings_appreciation', function (Blueprint $table) {
            $table->id();
            $table->string('user_name', 150)->nullable();
            $table->string('email', 191)->nullable();
            $table->string('phone', 30)->nullable();
            $table->text('message')->nullable();
            $table->string('specify_type', 255)->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->integer('is_submitted')->default(0);
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->nullOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('greetings_appreciation');
    }
};
