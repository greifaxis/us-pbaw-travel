<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->bigIncrements('id');
            $table->unsignedDecimal('total');
            $table->string('status');
            $table->string('billing_firstName')->nullable();
            $table->string('billing_lastName')->nullable();
            $table->string('billing_company')->nullable();
            $table->string('billing_nipnum')->nullable();
            $table->string('billing_phone')->nullable();
            $table->string('billing_address')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->dateTime('placed_at');
            $table->dateTime('finished_at');
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
