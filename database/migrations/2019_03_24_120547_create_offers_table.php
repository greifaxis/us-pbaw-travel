<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOffersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->unsignedDecimal('price');
            $table->unsignedDecimal('sale')->nullable();
            $table->date('date_begin');
            $table->date('date_end');
            $table->string('highlight')->nullable();
            $table->text('body')->nullable();
            $table->unsignedInteger('places_max')->nullable();
            $table->unsignedInteger('places_free')->nullable();
            $table->string('airport')->nullable();
            $table->json('images')->nullable();
            $table->unsignedBigInteger('hotel_id');
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
        Schema::dropIfExists('offers');
    }
}
