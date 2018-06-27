<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRelationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('relations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->index();
            $table->integer('mate_id')->unsigned()->index();
            $table->string('type')->index; //like or nope
            $table->timestamps();
            
             $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('mate_id')->references('id')->on('users')->onDelete('cascade');
            
            $table->unique(['user_id','mate_id']);
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('relations');
    }
}
