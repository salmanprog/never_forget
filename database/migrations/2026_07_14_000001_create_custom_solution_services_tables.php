<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomSolutionServicesTables extends Migration
{
    public function up()
    {
        Schema::create('custom_solution_services', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('description')->nullable();
            $table->string('image')->nullable();
            $table->unsignedInteger('sort_order')->default(0);
            $table->boolean('has_other_text')->default(false);
            $table->string('status')->default('1')->comment('0=inactive, 1=active');
            $table->timestamps();
        });

        Schema::create('custom_solution_options', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('custom_solution_service_id');
            $table->string('title');
            $table->unsignedInteger('sort_order')->default(0);
            $table->string('status')->default('1')->comment('0=inactive, 1=active');
            $table->timestamps();

            $table->foreign('custom_solution_service_id', 'cs_options_service_fk')
                ->references('id')
                ->on('custom_solution_services')
                ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('custom_solution_options');
        Schema::dropIfExists('custom_solution_services');
    }
}
