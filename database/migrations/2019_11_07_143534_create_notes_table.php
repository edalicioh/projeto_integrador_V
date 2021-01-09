<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notes', function (Blueprint $table) {
            /**
             *
             * ID | INT
             * title | VARCHAR
             * comment | VARCHAR
             * date | DATE
             * user_class_id | INT
             *
             */
            $table->bigIncrements('id');
            $table->string('title')->nullable(false);
            $table->string('comment')->nullable(false);
            $table->date('date')->nullable(false);
            $table->unsignedBigInteger('user_class_id');
            $table->foreign('user_class_id')->references('id')->on('user_class');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('notes');
    }
}
