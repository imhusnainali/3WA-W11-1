<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignToAll extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->foreign('clientId')->references('id')->on('users');
        });

        Schema::table('reservations', function (Blueprint $table) {
            $table->foreign('clientId')->references('id')->on('users');
            $table->foreign('reservationTableId')->references('id')->on('tables');
        });

        Schema::table('carts', function (Blueprint $table) {
            $table->foreign('clientId')->references('id')->on('users');
            $table->foreign('orderId')->references('id')->on('orders');
            $table->foreign('dishId')->references('id')->on('dishes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropForeign('orders_clientId_foreign');
        });

        Schema::table('reservations', function (Blueprint $table) {
            $table->dropForeign('reservations_clientId_foreign');
            $table->dropForeign('reservations_reservationTableId_foreign');
        });

        Schema::table('dishes', function (Blueprint $table) {
            $table->dropForeign('dishes_clientId_foreign');
            $table->dropForeign('dishes_reservationTableId_foreign');
            $table->dropForeign('dishes_dishId_foreign');
        });
    }
}
