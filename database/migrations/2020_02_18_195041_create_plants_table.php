<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plants', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->integer('amount');
            $table->string('plant_type');
            $table->string('picture')->nullable();
            $table->longText('notes');
            $table->Date('planted_at');
            $table -> unsignedBigInteger('user_id')->index();
            $table->foreign('user_id')->references('id')->on('users');
            $table -> unsignedBigInteger('locations_id')->index();
            $table->foreign('locations_id')->references('id')->on('locations');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('plants');
    }
}
