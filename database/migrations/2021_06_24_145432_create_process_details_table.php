<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProcessDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('process_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('registrant_id')->unsigned();
            $table->datetime('process_time');
            $table->uuid('status_id');
            $table->foreign('registrant_id')->references('id')->on('processes')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('process_details');
    }
}
