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
            $table->string('first_operation_class')->nullable();
            $table->string('second_operation_class')->nullable();
            $table->string('third_operation_class')->nullable();
            $table->string('forth_operation_class')->nullable();
            $table->string('fifth_operation_class')->nullable();
            $table->string('sixth_operation_class')->nullable();
            $table->integer('record_timing_id')->unsigned();
            $table->foreign('record_timing_id')->references('id')->nullable()->on('record_timings');

            $table->text('kanni_keisan')->nullable();
            $table->text('syousai_keisan')->nullable();

            $table->string('first_amount_name')->nullable();
            $table->integer('first_amount')->nullable();
            $table->string('second_amount_name')->nullable();
            $table->integer('second_amount')->nullable();
            $table->string('third_amount_name')->nullable();
            $table->integer('third_amount')->nullable();
            $table->string('forth_amount_name')->nullable();
            $table->integer('forth_amount')->nullable();

            $table->string('tanni')->nullable();

            $table->text('reason_title')->nullable();
            $table->text('reason_text')->nullable();

            $table->text('memo')->nullable();

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
