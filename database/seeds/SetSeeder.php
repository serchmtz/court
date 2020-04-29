<?php

use Illuminate\Database\Seeder;

class SetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        date_default_timezone_set('America/Mexico_City');
        $nSetsAvaliable=array(3,5,7);
        $sets=array();
        for($i=1;$i<=36;$i++)
        {
            $numberofSets=$nSetsAvaliable[rand(0,sizeof($nSetsAvaliable)-1)];
            for($j=1;$j<=$numberofSets;$j++)
            {
                $p1Score=rand(5,10);
                $p2Score=$p1Score-2;
                if($j==$numberofSets)
                    $tiebreak=rand(0,1)==0?false:true;
                else
                    $tiebreak=false;
                $sets[]= array(
                    'match_id' => $i,
                    'nSet'=> $j,
                    'player1Score'=> $p1Score,
                    'player2Score'=> $p2Score,
                    'tiebreak'=> $tiebreak,
                    'created_at' => date("Y-m-d H:i:s"),
                    'updated_at' => date("Y-m-d H:i:s")   
                );
            }
        }
        DB::table('sets')->insert($sets);
    }
}
