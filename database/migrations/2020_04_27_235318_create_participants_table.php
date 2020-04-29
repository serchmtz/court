<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParticipantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('participants', function (Blueprint $table) {
            $table->id();
            $table->integer('team_id')->nullable();
            $table->integer('player_id')->nullable();
            $table->timestamps();
        });
        DB::unprepared('
        CREATE TRIGGER player_to_participants AFTER INSERT ON `players` FOR EACH ROW
            BEGIN
                INSERT INTO participants (`player_id`, `created_at`, `updated_at`) 
                VALUES (NEW.id, now(), now());
            END
        ');
        DB::unprepared('
        CREATE TRIGGER team_to_participants AFTER INSERT ON `teams` FOR EACH ROW
            BEGIN
                INSERT INTO participants (`team_id`, `created_at`, `updated_at`) 
                VALUES (NEW.id, now(), now());
            END
        ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('participants');
    }
}
