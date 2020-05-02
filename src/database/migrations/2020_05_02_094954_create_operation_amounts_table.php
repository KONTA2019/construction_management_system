<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOperationAmountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('operation_amounts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_amount_name')->nullable();
            $table->integer('first_amount')->nullable();
            $table->string('second_amount_name')->nullable();
            $table->integer('second_amount')->nullable();
            $table->string('third_amount_name')->nullable();
            $table->integer('third_amount')->nullable();
            $table->integer('operation_id')->unsigned();
            $table->foreign('operation_id')->references('id')->on('operations')->nullable();
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
        Schema::dropIfExists('operation_amounts');
    }
}
