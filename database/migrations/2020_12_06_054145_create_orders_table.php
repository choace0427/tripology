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
            $table->integer('traveller_id');
            $table->integer('package_id');
            $table->text('txnid');
            $table->text('original_currency_name');
            $table->text('original_currency_sign');
            $table->text('original_price');            
            $table->text('paid_amount');
            $table->text('fee_amount');
            $table->text('net_amount');
            $table->text('card_last4')->nullable();
            $table->text('card_exp_month')->nullable();
            $table->text('card_exp_year')->nullable();
            $table->text('payment_method');
            $table->text('payment_status');
            $table->integer('total_person');
            $table->text('order_no');
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
