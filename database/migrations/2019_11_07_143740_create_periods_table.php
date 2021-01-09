<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeriodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('periods', function (Blueprint $table) {
            /**
             *
             * ID | INT
             * begins_class | DATE
             * end_classes | DATE
             * class_cycle | VARCHAR
             * student_has_class_id | INT
             *
             */

            $table->bigIncrements('id');
            $table->date('begins_class')->nullable(false)
                ->comment('Nesta campo deve conter a data de inicio do periudo ( semestre , trimestre , bimestre ) EX.: 01-01-1900');
            $table->date('end_classes')->nullable(false)
                ->comment('Nesta campo deve conter a data de final do periudo ( semestre , trimestre , bimestre ) EX.: 31-31-1900');
            $table->enum('class_cycle', [1, 2, 3, 4])->nullable(false)
                ->comment('Define em qual do período ano letivo ( 1 : para o primeiro , 2 : para o segundo , 3 : para o terceiro , 4 : para o quarto ');
            $table->unsignedBigInteger('student_class_id');
            $table->foreign('student_class_id')->references('id')->on('student_Class');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('periods');
    }
}
