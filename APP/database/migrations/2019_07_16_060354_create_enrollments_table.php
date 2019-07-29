<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEnrollmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enrollments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('agentID',false)->nullable(true);
            $table->unsignedBigInteger('memberID',false)->nullable(true);
            $table->unsignedBigInteger('recommenderID',false)->nullable(true);
            $table->date('dateOfEnrollment');
            $table->foreign('agentID')->references('id')->on('agents');
            $table->foreign('memberID')->references('id')->on('members');
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
        Schema::dropIfExists('enrollments');
    }
}
