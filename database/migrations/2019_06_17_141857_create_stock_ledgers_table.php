<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStockLedgersTable extends Migration
{
    public function up()
    {
        Schema::create('stock_ledgers', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('purchase_id');
            $table->integer('item_id');
            $table->decimal('purchase_price', 10, 2);
            $table->decimal('sales_price', 10, 2);
            $table->integer('in_qty')->default(0);
            $table->integer('out_qty')->default(0);
            $table->integer('p_rtn_qtn')->default(0);
            $table->integer('s_rtn_qtn')->default(0);
            $table->timestamps();

            $table->foreign('purchase_id')->references('id')->on('purchase_ledgers')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('stock_ledgers');
    }
}
