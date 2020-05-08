<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecordTimingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('record_timings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('specific');
            $table->string('span');
            $table->string('period');
            $table->integer('project_id')->unsigned();
            $table->foreign('project_id')->references('id')->on('projects')->nullable()->onDelete('cascade');
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
        Schema::dropIfExists('record_timings');
    }
}
