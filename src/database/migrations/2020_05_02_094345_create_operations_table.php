<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOperationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('operations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_operation_class');
            $table->string('second_operation_class');
            $table->string('third_operation_class');
            $table->string('forth_operation_class');
            $table->string('fifth_operation_class');
            $table->string('sixth_operation_class');
            $table->integer('record_timing_id')->unsigned();
            $table->foreign('record_timing_id')->references('id')->on('record_timings');
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
        Schema::dropIfExists('operations');
    }
}
