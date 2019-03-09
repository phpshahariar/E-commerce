<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('main_category_id');
            $table->integer('sub_category_id');
            $table->integer('product_brand');
            $table->integer('top_sellers')->nullable();
            $table->integer('special')->nullable();
            $table->integer('product_qty');
            $table->date('ex_date')->nullable();
            $table->string('product_name_eng');
            $table->string('product_name_ban')->nullable();
            $table->string('product_name_hin')->nullable();
            $table->float('product_price_eng');
            $table->float('product_price_ban')->nullable();
            $table->float('product_price_hin')->nullable();
            $table->text('product_short_description_eng');
            $table->text('prodcut_short_description_ban')->nullable();
            $table->text('product_short_description_hin')->nullable();
            $table->text('prodcut_long_description_eng');
            $table->text('prodcut_long_description_ban')->nullable();
            $table->text('product_long_description_hin')->nullable();
            $table->string('product_color_eng');
            $table->string('product_color_ban')->nullable();
            $table->string('product_color_hin')->nullable();
            $table->float('shipping_outside_country_eng');
            $table->float('shipping_outside_country_ban')->nullable();
            $table->float('shipping_outside_country_hin')->nullable();
            $table->float('shipping_inside_country_eng');
            $table->float('shipping_inside_country_ban')->nullable();
            $table->float('shipping_inside_country_hin')->nullable();
            $table->float('shipping_inside_region_eng');
            $table->float('shipping_inside_region_ban')->nullable();
            $table->float('shipping_inside_region_hin')->nullable();
            $table->integer('prodcut_image');
            $table->integer('product_size')->nullable();
            $table->tinyInteger('status');
            $table->integer('admin_id');
            $table->integer('country_id');
            $table->integer('division_id');
            $table->integer('district_id');
            $table->integer('sub_district_id');
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
        Schema::dropIfExists('products');
    }
}
