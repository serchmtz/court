<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stats', function (Blueprint $table) {
            $table->id();
            $table->integer('match_id');
            $table->integer('acesP1');
            $table->integer('acesP2');
            $table->integer('doubleFaultP1');
            $table->integer('doubleFaultP2');
            $table->integer('firstServicePercentageP1');
            $table->integer('firstServicePercentageP2');
            $table->integer('servicePointsWonP1');
            $table->integer('servicePointsWonP2');
            $table->integer('tiebreaksWonP1');
            $table->integer('tiebreaksWonP2');
            $table->integer('serverGamesWonP1');
            $table->integer('serverGamesWonP2');
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
        Schema::dropIfExists('stats');
    }
}
