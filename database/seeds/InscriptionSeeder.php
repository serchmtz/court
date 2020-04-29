<?php

use Illuminate\Database\Seeder;

class InscriptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        date_default_timezone_set('America/Mexico_City');
		$playersT1 = array();
        for ($i = 1; $i <= 16; $i++) {
            $playersT1[] = array(
                'tournament_id' => 1,
                'participant_id'=> $i,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")   
            );
        }
		$playersT2 = array();
        for ($i = 17; $i <= 32; $i++) {
            $playersT2[] = array(
                'tournament_id' => 2,
                'participant_id'=> $i,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")   
            );
        }
        $playersT3 = array();
        for ($i = 41; $i <= 44; $i++) {
            $playersT3[]= array(
                'tournament_id' => 3,
                'participant_id'=> $i,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")   
            );
        }
        $playersT4 = array();
        for ($i = 33; $i <= 36; $i++) {
            $playersT4[] = array(
                'tournament_id' => 4,
                'participant_id'=> $i,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")   
            );
        }
        $inscriptions = array_merge($playersT1,$playersT2,$playersT3,$playersT4);
        DB::table('inscriptions')->insert($inscriptions);
    }
}
