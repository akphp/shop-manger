<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCountriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('countries', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('country_name');
            $table->unsignedBigInteger('country_currency_id');
            $table->string('country_postal_code');
            $table->integer('mobile_prefix');
            $table->integer('is_active');
            $table->unsignedBigInteger('language_id');
            $table->unsignedBigInteger('user_id');
            $table->integer('nationality');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('countries');
    }
}
