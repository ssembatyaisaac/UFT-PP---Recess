<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAgentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agents', function (Blueprint $table) {
            $table->bigIncrements('id',2);
            $table->string('fName',25);
            $table->string('lName',25);
            $table->string('gender',5);
            $table->unsignedBigInteger('agentHeadID',false)->nullable(true);
            $table->unsignedBigInteger('districtID',false)->nullable(true);
            $table->string('signature',1)->nullable(true);
            $table->timestamps();
            $table->foreign('districtID')->references('id')->on('districts');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('agents');
    }
}
