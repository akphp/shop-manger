<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlanOffersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plan_offers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('offer_title');
            $table->unsignedBigInteger('plan_id');
            $table->integer('start_date');
            $table->integer('end_date');
            $table->integer('discount_percentage_per_year');
            $table->integer('discount_percentage_per_month');
            $table->integer('is_active');
            $table->unsignedBigInteger('user_id');
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
        Schema::dropIfExists('plan_offers');
    }
}
