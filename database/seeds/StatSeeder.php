<?php

use Illuminate\Database\Seeder;

class StatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        date_default_timezone_set('America/Mexico_City');
        $t1=
        [
            [
                'match_id' => 1,
                'acesP1'=> 8,
                'acesP2'=> 1,
                'doubleFaultP1'=> 1,
                'doubleFaultP2'=> 4,
                'firstServicePercentageP1'=> 64,
                'firstServicePercentageP2'=> 56,
                'servicePointsWonP1'=> 62,
                'servicePointsWonP2'=> 50,
                'tiebreaksWonP1'=> 0,
                'tiebreaksWonP2'=> 0,
                'serverGamesWonP1'=> 14,
                'serverGamesWonP2'=> 10,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")   
            ],
            [
                'match_id' => 2,
                'acesP1'=> 12,
                'acesP2'=> 25,
                'doubleFaultP1'=> 4,
                'doubleFaultP2'=> 5,
                'firstServicePercentageP1'=> 66,
                'firstServicePercentageP2'=> 75,
                'servicePointsWonP1'=> 93,
                'servicePointsWonP2'=> 97,
                'tiebreaksWonP1'=> 2,
                'tiebreaksWonP2'=> 0,
                'serverGamesWonP1'=> 19,
                'serverGamesWonP2'=> 19,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")   
            ],
            [
                'match_id' => 3,
                'acesP1'=> 2,
                'acesP2'=> 9,
                'doubleFaultP1'=> 1,
                'doubleFaultP2'=> 0,
                'firstServicePercentageP1'=> 66,
                'firstServicePercentageP2'=> 76,
                'servicePointsWonP1'=> 57,
                'servicePointsWonP2'=> 60,
                'tiebreaksWonP1'=> 0,
                'tiebreaksWonP2'=> 0,
                'serverGamesWonP1'=> 14,
                'serverGamesWonP2'=> 10,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")   
            ],
            [
                'match_id' => 4,
                'acesP1'=> 5,
                'acesP2'=> 1,
                'doubleFaultP1'=> 0,
                'doubleFaultP2'=> 1,
                'firstServicePercentageP1'=> 75,
                'firstServicePercentageP2'=> 58,
                'servicePointsWonP1'=> 69,
                'servicePointsWonP2'=> 49,
                'tiebreaksWonP1'=> 0,
                'tiebreaksWonP2'=> 0,
                'serverGamesWonP1'=> 15,
                'serverGamesWonP2'=> 9,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")   
            ],
            [
                'match_id' => 5,
                'acesP1'=> 18,
                'acesP2'=> 19,
                'doubleFaultP1'=> 1,
                'doubleFaultP2'=> 2,
                'firstServicePercentageP1'=> 69,
                'firstServicePercentageP2'=> 69,
                'servicePointsWonP1'=> 94,
                'servicePointsWonP2'=> 92,
                'tiebreaksWonP1'=> 1,
                'tiebreaksWonP2'=> 0,
                'serverGamesWonP1'=> 20,
                'serverGamesWonP2'=> 19,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")   
            ],
        ];
        for($i=6;$i<=15;$i++){
            $t1[] = array(
                'match_id' => $i,
                'acesP1'=> rand(1, 35),
                'acesP2'=> rand(1, 35),
                'doubleFaultP1'=> rand(0, 5),
                'doubleFaultP2'=> rand(0, 5),
                'firstServicePercentageP1'=> rand(60, 80),
                'firstServicePercentageP2'=> rand(60, 80),
                'servicePointsWonP1'=> rand(65, 95),
                'servicePointsWonP2'=> rand(65, 85),
                'tiebreaksWonP1'=> rand(0, 2),
                'tiebreaksWonP2'=> rand(0, 2),
                'serverGamesWonP1'=> rand(10, 25),
                'serverGamesWonP2'=> rand(10, 25),
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")      
            );
        }
        $t2= array();
        for($i=16;$i<=30;$i++){
            $t2[] = array(
                'match_id' => $i,
                'acesP1'=> rand(1, 35),
                'acesP2'=> rand(1, 35),
                'doubleFaultP1'=> rand(0, 5),
                'doubleFaultP2'=> rand(0, 5),
                'firstServicePercentageP1'=> rand(60, 80),
                'firstServicePercentageP2'=> rand(60, 80),
                'servicePointsWonP1'=> rand(65, 95),
                'servicePointsWonP2'=> rand(65, 85),
                'tiebreaksWonP1'=> rand(0, 2),
                'tiebreaksWonP2'=> rand(0, 2),
                'serverGamesWonP1'=> rand(10, 25),
                'serverGamesWonP2'=> rand(10, 25),
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")      
            );
        }
        $t3= array();
        for($i=31;$i<=33;$i++){
            $t3[] = array(
                'match_id' => $i,
                'acesP1'=> rand(1, 35),
                'acesP2'=> rand(1, 35),
                'doubleFaultP1'=> rand(0, 5),
                'doubleFaultP2'=> rand(0, 5),
                'firstServicePercentageP1'=> rand(60, 80),
                'firstServicePercentageP2'=> rand(60, 80),
                'servicePointsWonP1'=> rand(65, 95),
                'servicePointsWonP2'=> rand(65, 85),
                'tiebreaksWonP1'=> rand(0, 2),
                'tiebreaksWonP2'=> rand(0, 2),
                'serverGamesWonP1'=> rand(10, 25),
                'serverGamesWonP2'=> rand(10, 25),
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")      
            );
        }
        $t4= array();
        for($i=34;$i<=36;$i++){
            $t4[] = array(
                'match_id' => $i,
                'acesP1'=> rand(1, 35),
                'acesP2'=> rand(1, 35),
                'doubleFaultP1'=> rand(0, 5),
                'doubleFaultP2'=> rand(0, 5),
                'firstServicePercentageP1'=> rand(60, 80),
                'firstServicePercentageP2'=> rand(60, 80),
                'servicePointsWonP1'=> rand(65, 95),
                'servicePointsWonP2'=> rand(65, 85),
                'tiebreaksWonP1'=> rand(0, 2),
                'tiebreaksWonP2'=> rand(0, 2),
                'serverGamesWonP1'=> rand(10, 25),
                'serverGamesWonP2'=> rand(10, 25),
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")      
            );
        }
        $stats = array_merge($t1,$t2,$t3,$t4);
        DB::table('stats')->insert($stats);
    }
}
