<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePerfectGiftCategoryTable extends Migration
{
    public function up()
    {
        Schema::create('perfect_gift_category', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('images')->nullable();
            $table->text('description')->nullable();
            $table->unsignedSmallInteger('sort_order')->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('perfect_gift_category');
        
    }
}

