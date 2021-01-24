<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {

            $table->bigIncrements('id');                        // ID
            $table->string('full_name')->nullable(false);       // Nome Completo
            $table->date('date_birth')->nullable(false);        // Data de nacimento
            $table->integer('registration')->nullable(false);   // Numero da matricula
            $table->string('gender', 1)->nullable(false); // Genero

            $table->unsignedBigInteger('class_id');
            $table->foreign('class_id')->references('id')->on('classes');
        });
        Schema::create('user_student', function (Blueprint $table) {
            $table->bigIncrements('id');    // ID

            $table->unsignedBigInteger('student_id');
            $table->unsignedBigInteger('user_id');

            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('user_student');
        Schema::dropIfExists('students');
    }
}
