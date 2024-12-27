<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('books', function(Blueprint $table){
            $table->unsignedBigInteger('author_id')->nullable(); //clave foranea para el autor con posibilidad que sea nulo
            $table->foreign('author_id')->references('id')->on('authors')->onDelete('set null'); //definicion de clave foranea
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
