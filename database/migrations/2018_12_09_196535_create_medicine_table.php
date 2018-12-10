<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMedicineTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicines', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();

            $table->string('name')->nullable()->default(null);
            $table->string('slug')->nullable()->default(null);
            $table->dateTime('published_at')->nullable()->default(null);
            $table->tinyInteger('is_published')->nullable()->default(null);
            $table->text('short_text')->nullable()->default(null);
            $table->longText('long_text')->nullable()->default(null);
            $table->string('image_url')->nullable()->default(null);
            $table->unsignedInteger('price')->nullable()->default(null);

            $table->unsignedInteger('creator_id')->nullable()->default(null);
            $table->foreign('creator_id')->references('id')->on('users');

            $table->unsignedInteger('category_id')->nullable()->default(null);
            $table->foreign('category_id')->references('id')->on('categories');

            $table->unsignedInteger('company_id')->nullable()->default(null);
            $table->foreign('company_id')->references('id')->on('companies');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('medicines');
    }
}
