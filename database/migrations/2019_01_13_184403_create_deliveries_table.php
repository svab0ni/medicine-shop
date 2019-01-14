<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDeliveriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('delivery_status', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();

            $table->string('name')->nullable()->default(null);
        });

        Schema::create('deliveries', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();

            $table->string('note')->nullable()->default(null);
            $table->integer('price')->nullable()->default(null);
            $table->string('address')->nullable()->default(null);
            $table->string('phone')->nullable()->default(null);

            $table->unsignedInteger('status_id')->nullable()->default(null);
            $table->foreign('status_id')->references('id')->on('delivery_status');

            $table->unsignedInteger('user_id')->nullable()->default(null);
            $table->foreign('user_id')->references('id')->on('users');

            $table->unsignedInteger('courier_id')->nullable()->default(null);
            $table->foreign('courier_id')->references('id')->on('users');
        });


        Schema::create('delivery_medicine', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();

            $table->unsignedInteger('price')->nullable()->default(null);
            $table->unsignedInteger('quantity')->nullable()->default(null);

            $table->unsignedInteger('medicine_id')->nullable()->default(null);
            $table->foreign('medicine_id')->references('id')->on('medicines');

            $table->unsignedInteger('delivery_id')->nullable()->default(null);
            $table->foreign('delivery_id')->references('id')->on('deliveries');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('delivery_medicine');
        Schema::dropIfExists('deliveries');
        Schema::dropIfExists('delivery_status');
    }
}
