<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCardUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('card_user', function(Blueprint $table)
        {
            $table->integer('card_id')->unsigned()->index();
            $table->foreign('card_id')->references('id')->on('cards')->onDelete('cascade');

            $table->integer('userProfiles_id')->unsigned()->index();
            $table->foreign('userProfiles_id')->references('id')->on('userProfiles')->onDelete('cascade');

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
        Schema::dropIfExists('card_user');
    }
}
