<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGustoServicesTables extends Migration
{
    public function up()
    {
        Schema::create('gusto_services', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('description')->nullable();
            $table->unsignedInteger('sort_order')->default(0);
            $table->string('status')->default('1')->comment('0=inactive, 1=active');
            $table->timestamps();
        });

        Schema::create('gusto_options', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('gusto_service_id');
            $table->string('title');
            $table->unsignedInteger('sort_order')->default(0);
            $table->string('status')->default('1')->comment('0=inactive, 1=active');
            $table->timestamps();

            $table->foreign('gusto_service_id', 'gusto_options_service_fk')
                ->references('id')
                ->on('gusto_services')
                ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('gusto_options');
        Schema::dropIfExists('gusto_services');
    }
}
