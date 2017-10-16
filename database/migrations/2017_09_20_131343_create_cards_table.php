<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cards', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('cardSet');
            $table->string('type');
            $table->string('rarity');
            $table->integer('cost');
            $table->integer('attack')->nullable();
            $table->integer('health')->nullable();
            $table->string('playerClass');
            $table->integer('craftingCost')->nullable();
            $table->string('img');
            $table->string('state')->default('checked');
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
        Schema::dropIfExists('cards');
    }
}
