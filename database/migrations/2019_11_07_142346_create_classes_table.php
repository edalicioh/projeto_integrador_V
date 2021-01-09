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
        // cria a tabela class
        Schema::create('classes', function (Blueprint $table) {
            /**
             *
             * ID | INT
             * period |  VARCHAR
             * class_number | INT
             *
             */
            $table->bigIncrements('id');    // ID
            $table->enum('period', ['M', 'V'])->nullable(false);
            $table->integer('class_number')->nullable(false);
        });
        // cria a tabela de ligacao da tabela user com a tabela class
        Schema::create('user_class', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('class_id');
            $table->unsignedBigInteger('user_id');

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('class_id')->references('id')->on('classes');
        });
        //cria a tabela de ligacao entre tabela class e tabela stundent
        Schema::create('student_Class', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('class_id');
            $table->unsignedBigInteger('student_id');

            $table->foreign('class_id')->references('id')->on('classes');
            $table->foreign('student_id')->references('id')->on('students');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('classes');
    }
}
