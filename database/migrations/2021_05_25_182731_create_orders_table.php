<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('customer_id')->comment('customer id');
            $table->bigInteger('billing_address_id')->comment('customer billing address id');
            $table->bigInteger('order_number')->comment('Generate 6 digits random number as a order number')->nullable();
            $table->string('coupon_id')->nullable();
            $table->string('payment_id')->nullable();
            $table->string('payment_method')->nullable()->comment('Paytroit Payment');
            $table->bigInteger('total_amount');
            $table->string('discount_type')->nullable();
            $table->float('discount_amount')->nullable();
            $table->string('net_amount')->nullable();
            $table->date('order_date')->nullable();
            $table->string('order_note')->nullable();
            $table->string('order_status')->comment('succeeded, failed');
            $table->string('payment_status')->comment('paid, unpaid');
            $table->boolean('status')->default(1)->comment('1=active, 0=inactive');
            $table->string('deleted_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
