<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        date_default_timezone_set('America/Mexico_City');
        $this->call(UserSeeder::class);
        $this->call(PlayerSeeder::class);
        $this->call(TeamSeeder::class);
        $this->call(MemberSeeder::class);
        // run ParticipantSeeder but it was not necessary
        $this->call(TournamentSeeder::class);
        $this->call(InscriptionSeeder::class);
        $this->call(MatchSeeder::class);
        $this->call(StatSeeder::class);
        $this->call(SetSeeder::class);
    }
}
