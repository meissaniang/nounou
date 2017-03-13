<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNanniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nannies', function (Blueprint $table) {
            $table->increments('id');
                $table->integer('user_id')->unsigned()->unique();
                $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
                $table->boolean('licence')->nullable();
                $table->boolean('experience')->nullable();
                $table->boolean('feeding_bottle')->nullable();
                $table->boolean('kitchen')->nullable();
                $table->boolean('exam')->nullable();
                $table->boolean('housework')->nullable();
                $table->boolean('animal')->nullable();
                $table->boolean('guard')->nullable();
                $table->engine = 'InnoDB';
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
        Schema::dropIfExists('nannies');
    }
}
