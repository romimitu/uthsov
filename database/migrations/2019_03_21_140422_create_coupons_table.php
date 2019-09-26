<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCouponsTable extends Migration
{

    public function up()
    {
        Schema::create('coupons', function (Blueprint $table) {
            $table->increments('id');
            $table->string('coupon_code', 32);
            $table->string('name', 64);
            $table->decimal('discount_amount', 10, 2);
            $table->date('starts_date');
            $table->date('expires_date');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('coupons');
    }
}
