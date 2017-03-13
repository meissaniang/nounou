<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ads', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->longText('ad');
            $table->enum('frequence',['occasionnel','sorti ecole','plein temps']);
            $table->float('occasional_price');
            $table->float('full_time_price');
            $table->integer('nanny_id')->unsigned();
            $table->foreign('nanny_id')->references('id')->on('nannies')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('ads');
    }
}
