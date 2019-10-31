<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSuppliersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suppliers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('full_name');
            $table->string('email');
            $table->integer('mobile');
            $table->unsignedBigInteger('country_id');
            $table->unsignedBigInteger('nationality_id');
            $table->unsignedBigInteger('city_id');
            $table->unsignedBigInteger('store_id');
            $table->integer('address');
            $table->integer('is_active');
            $table->unsignedBigInteger('user_id');
            $table->softDeletes();

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
        Schema::dropIfExists('suppliers');
    }
}
