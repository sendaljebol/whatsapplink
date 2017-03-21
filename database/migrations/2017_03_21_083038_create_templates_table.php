<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTemplatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('templates', function (Blueprint $table) {
            $table->increments('id');
            $table->string('phone');
            $table->string('text');
            $table->timestamps();
        });

        Schema::create('variables', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('templates_id')->unsigned();
            $table->foreign('templates_id')
            ->references('id')->on('templates')
            ->onDelete('cascade');
            $table->string('variable');
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
        Schema::drop('variables');
        Schema::drop('templates');
        
    }
}
