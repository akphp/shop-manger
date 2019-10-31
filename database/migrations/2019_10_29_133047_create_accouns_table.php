<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccounsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accouns', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('store_id');
            $table->date('last_payment');
            $table->integer('plan_id');
            $table->integer('status');
            $table->date('expired_date');
            $table->date('last_renew_date');
            $table->string('sub_domain');
            $table->string('business_name');
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
        Schema::dropIfExists('accouns');
    }
}
