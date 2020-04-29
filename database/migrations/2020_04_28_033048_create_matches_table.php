<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matches', function (Blueprint $table) {
            $table->id();
            $table->integer('tournament_id');
            $table->integer('player1');
            $table->integer('player2');
            $table->integer('winner_id');
            $table->string('round',40)->comments('
                final,semifinal,quarters,fourth,third,second,first'
            );
            $table->datetime('started_at',0);
            $table->datetime('finished_at',0);
            $table->boolean('abandoned')->default(false);
            $table->string('excuse',50)->nullable()->default(null);
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
        Schema::dropIfExists('matches');
    }
}
