<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePurchaseLedgersTable extends Migration
{
    public function up()
    {
        Schema::create('purchase_ledgers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('invoice_no', 32);
            $table->string('receipt_no', 32);
            $table->string('receipt_date', 32);
            $table->integer('supp_id')->default(0);
            $table->decimal('payable_amount', 10, 2);
            $table->decimal('less_amount', 10, 2);
            $table->decimal('paid_amount', 10, 2);
            $table->decimal('return_amount', 10, 2);
            $table->integer('total_item');
            $table->string('status', 32)->default('Purchase');
            $table->enum('payment_status', ['Due', 'Paid'])->default('Due');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('purchase_ledgers');
    }
}
