<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGradesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grades', function (Blueprint $table) {
             /**
             *
             * ID | INT
             * date | DATE
             * grade | DOUBLE
             *
             */
            $table->bigIncrements('id');
            $table->date('date')->nullable(false)->comment('Define a data em que o trabalho ou prova foi aplicada');
            $table->double('grade' , 8 , 2)->nullable(false)->comment('Define a nota do estudante');
            $table->unsignedBigInteger('periods_id');
            $table->foreign('periods_id')->references('id')->on('periods');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('grades');
    }
}
