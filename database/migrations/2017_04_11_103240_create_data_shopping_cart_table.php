<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDataShoppingCartTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_shopping_cart', function (Blueprint $table) {
            $table->increments('id')->comment('购物车表');
            $table->integer('user_id')->comment('用户ID');
            $table->integer('cargo_id')->comment('货品ID');
            $table->integer('shopping_number')->comment('货品数量');
            $table->timestamps();
            $table->softDeletes()->comment('软删除');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('data_shopping_cart');
    }
}
