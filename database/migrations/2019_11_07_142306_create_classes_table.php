<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('classes', function (Blueprint $table) {

            $table->bigIncrements('id');    // ID
            $table->string('period', 1)->nullable(false);
            $table->integer('class_number')->nullable(false);
            $table->date('begins_class')->nullable(false);
            $table->date('end_classes')->nullable(false);
            $table->integer('class_cycle')->nullable(false);
        });

        Schema::create('user_class', function (Blueprint $table) {
            $table->bigIncrements('id');    // ID

            $table->unsignedBigInteger('class_id');
            $table->unsignedBigInteger('user_id');

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('class_id')->references('id')->on('classes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_class');
        Schema::dropIfExists('classes');
    }
}
