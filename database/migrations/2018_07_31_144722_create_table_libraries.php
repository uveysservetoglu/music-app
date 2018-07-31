<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableLibraries extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('libraries', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name')->comment("Library Name");
            $table->string('description')->nullable()->comment("Library About vs.");
            $table->string('image')->nullable()->comment("Library Image");;
            $table->string('slug')->comment("Library Slug");

            $table->char('status')->comment("Music Status(a)Active,(p)Passive)");

            $table->integer('hit');
            $table->integer('sort_order')->comment("Sort Order");

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
        Schema::dropIfExists('libraries');
    }
}
