<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableSong extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('song', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');

            $table->string('name')->comment("Song Name");;
            $table->string('file')->comment("For Song Image (*.mp3 vs..)");;
            $table->string('type')->comment("Music Type (Rock, Jazz, Blues, Soul)");
            $table->string('slug')->comment("Music slug");

            $table->char('status')->comment("Music Status(a)Active,(p)Passive)");

            $table->integer('sort_order')->comment("Sort Order");


            $table->Integer('library_id')->unsigned()->nullable();
            $table->foreign('library_id')->references('id')->on ('libraries')->onDelete('set null');




            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('song');
    }
}
