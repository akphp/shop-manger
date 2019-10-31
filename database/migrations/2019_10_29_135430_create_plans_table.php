<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('plan_title');
            $table->integer('price_month');
            $table->integer('price_year');
            $table->integer('currency_id');
            $table->integer('plan_level');
            $table->integer('no_inventory');
            $table->integer('no_pos');
            $table->integer('no_emp');
            $table->integer('no_item');
            $table->integer('is_active');
            $table->text('description');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('is_trial');
            $table->integer('interval_trail');
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
        Schema::dropIfExists('plans');
    }
}
