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
            $table->integer('user_id')->nullable();
            $table->string('cart');
            $table->string('pay_amount');
            $table->string('method')->nullable();
            $table->string('transaction_id')->nullable();
            $table->string('payment_status')->default('pending');
            $table->string('shipping')->nullable();
            $table->string('pickup_location')->nullable();
            $table->string('total_quantity');
            $table->string('charge_id')->nullable();
            $table->string('order_number');
            $table->string('customer_email');
            $table->string('customer_name');
            $table->string('customer_phone');
            $table->string('customer_address')->nullable();
            $table->string('customer_country')->nullable();
            $table->string('customer_city')->nullable();
            $table->string('customer_zip')->nullable();
            $table->string('shipping_name')->nullable();
            $table->string('shipping_email')->nullable();
            $table->string('shipping_country')->nullable();
            $table->string('shipping_city')->nullable();
            $table->string('shipping_address')->nullable();
            $table->string('shipping_phone')->nullable();
            $table->string('shipping_zip')->nullable();
            $table->string('order_note')->nullable();
            $table->string('coupon_code')->nullable();
            $table->string('coupon_discount')->nullable();
            $table->string('status')->default('pending');
            $table->string('affiliate_user')->nullable();
            $table->string('affiliate_amount')->nullable();
            $table->string('currency_sign');
            $table->string('currency_code');
            $table->string('currency_value');
            $table->double('shipping_cost');
            $table->double('packing_cost')->default(0);
            $table->double('tax');
            $table->string('tax_location')->nullable();
            $table->tinyInteger('dp')->default(0);
            $table->string('pay_id')->nullable();
            $table->double('wallet_price')->default(0);
            $table->string('shipping_title')->nullable();
            $table->string('packing_title')->nullable();
            $table->string('customer_state')->nullable();
            $table->integer('discount')->default(0);
            $table->double('commission')->default(0);
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
