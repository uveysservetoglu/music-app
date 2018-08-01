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
            $table->string('file')->comment("For Song Image (*.mp3 vs..)")->nullable();
            $table->string('type')->comment("Music Type (Rock, Jazz, Blues, Soul)")->nullable();
            $table->string('slug')->comment("Music slug");
            $table->integer('hit')->comment("Music Hit");
            $table->char('status')->comment("Music Status(a)Active,(p)Passive)");
            $table->integer('sort_order')->comment("Sort Order");

            $table->Integer('libraries_id')->unsigned()->nullable();

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
