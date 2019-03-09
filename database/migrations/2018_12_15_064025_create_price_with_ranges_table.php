<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePriceWithRangesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('price_with_ranges', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('price_first_number');
            $table->integer('price_last_number');
            $table->integer('first_to_last_number_price_arry');
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
        Schema::dropIfExists('price_with_ranges');
    }
}
