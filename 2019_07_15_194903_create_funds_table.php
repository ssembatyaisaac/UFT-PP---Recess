4<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFundsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('funds', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('amountPaid',false,false);
            $table->date('dateOfPayment');
            $table->unsignedBigInteger('donorID',false)->nullable(true);
            $table->foreign('donorID')->references('id')->on('donors');
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
        Schema::dropIfExists('funds');
    }
}
