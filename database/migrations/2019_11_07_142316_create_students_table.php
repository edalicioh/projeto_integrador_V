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
             /**
             *
             * ID | INT
             * full_name | VARCHAR
             * date_birth | DATE
             * registration | INT
             * gender | VARCHAR
             *
             */
            $table->bigIncrements('id');                        // ID
            $table->string('full_name')->nullable(false);       // Nome Completo
            $table->date('date_birth')->nullable(false);        // Data de nacimento
            $table->integer('registration')->nullable(false);   // Numero da matricula
            $table->enum('gender' , ['M', 'F' , 'O'])->nullable(false); // Genero

        });
        // cria a tabela de ligacao de studants com o user
        Schema::create('studentHasUser', function (Blueprint $table) {
            $table->bigIncrements('id');

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
        Schema::dropIfExists('students');
    }
}
