<?php

use Illuminate\Database\Seeder;

class MatchSeeder extends Seeder
{
    public function randomDate($start_date, $end_date)
    {
        // Convert to timetamps
        $min = strtotime($start_date);
        $max = strtotime($end_date);

        // Generate random number using above bounds
        $val = rand($min, $max);

        // Convert back to desired date format
        return date('Y-m-d H:i:s', $val);
    }
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        date_default_timezone_set('America/Mexico_City');
        $t1 = 
        [
            [
                'tournament_id' => 1,
                'player1'=> 1,
                'player2'=> 9,
                'winner_id' => 1,
                'round' =>'fourth',
                'started_at' =>$this->randomDate("2020-01-20 10:00:00","2020-01-20 10:00:00"),
                'finished_at' =>$this->randomDate("2020-01-20 13:00:00","2020-01-20 13:00:00"),
                'abandoned' => false,
                'excuse' => null,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")   
            ],
            [
                'tournament_id' => 1,
                'player1'=> 2,
                'player2'=> 10,
                'winner_id' => 2,
                'round' => 'fourth',
                'started_at' =>$this->randomDate("2020-01-20 14:00:00","2020-01-20 14:00:00"),
                'finished_at' =>$this->randomDate("2020-01-20 17:00:00","2020-01-20 17:00:00"),
                'abandoned' => false,
                'excuse' => null,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")   
            ],
            [
                'tournament_id' => 1,
                'player1'=> 3,
                'player2'=> 11,
                'winner_id' => 3,
                'round' => 'fourth',
                'started_at' =>$this->randomDate("2020-01-21 08:00:00","2020-01-21 08:00:00"),
                'finished_at' =>$this->randomDate("2020-01-21 11:00:00","2020-01-20 11:00:00"),
                'abandoned' => false,
                'excuse' => null,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")   
            ],
            [
                'tournament_id' => 1,
                'player1'=> 4,
                'player2'=> 12,
                'winner_id' => 4,
                'round' => 'fourth',
                'started_at' =>$this->randomDate("2020-01-21 12:00:00","2020-01-20 12:00:00"),
                'finished_at' =>$this->randomDate("2020-01-21 15:00:00","2020-01-20 15:00:00"),
                'abandoned' => false,
                'excuse' => null,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")   
            ],
            [
                'tournament_id' => 1,
                'player1'=> 5,
                'player2'=> 13,
                'winner_id' => 5,
                'round' => 'fourth',
                'started_at' =>$this->randomDate("2020-01-21 15:00:00","2020-01-20 15:00:00"),
                'finished_at' =>$this->randomDate("2020-01-21 18:00:00","2020-01-20 18:00:00"),
                'abandoned' => false,
                'excuse' => null,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")   
            ],
            [
                'tournament_id' => 1,
                'player1'=> 6,
                'player2'=> 14,
                'winner_id' => 6,
                'round' => 'fourth',
                'started_at' =>$this->randomDate("2020-01-22 08:00:00","2020-01-22 08:00:00"),
                'finished_at' =>$this->randomDate("2020-01-22 11:00:00","2020-01-22 11:00:00"),
                'abandoned' => false,
                'excuse' => null,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")   
            ],
            [
                'tournament_id' => 1,
                'player1'=> 7,
                'player2'=> 15,
                'winner_id' => 7,
                'round' => 'fourth',
                'started_at' =>$this->randomDate("2020-01-22 12:00:00","2020-01-22 12:00:00"),
                'finished_at' =>$this->randomDate("2020-01-22 15:00:00","2020-01-22 15:00:00"),
                'abandoned' => false,
                'excuse' => null,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")   
            ],
            [
                'tournament_id' => 1,
                'player1'=> 8,
                'player2'=> 16,
                'winner_id' => 8,
                'round' => 'fourth',
                'started_at' =>$this->randomDate("2020-01-22 16:00:00","2020-01-22 16:00:00"),
                'finished_at' =>$this->randomDate("2020-01-22 19:00:00","2020-01-22 19:00:00"),
                'abandoned' => false,
                'excuse' => null,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")   
            ],
            [
                'tournament_id' => 1,
                'player1'=> 1,
                'player2'=> 2,
                'winner_id' => 1,
                'round' => 'quarters',
                'started_at' =>$this->randomDate("2020-01-23 08:00:00","2020-01-23 08:00:00"),
                'finished_at' =>$this->randomDate("2020-01-23 11:00:00","2020-01-23 11:00:00"),
                'abandoned' => false,
                'excuse' => null,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")   
            ],
            [
                'tournament_id' => 1,
                'player1'=> 3,
                'player2'=> 5,
                'winner_id' => 3,
                'round' => 'quarters',
                'started_at' =>$this->randomDate("2020-01-23 12:00:00","2020-01-23 12:00:00"),
                'finished_at' =>$this->randomDate("2020-01-23 15:00:00","2020-01-23 15:00:00"),
                'abandoned' => false,
                'excuse' => null,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")   
            ],
            [
                'tournament_id' => 1,
                'player1'=> 4,
                'player2'=> 6,
                'winner_id' => 4,
                'round' => 'quarters',
                'started_at' =>$this->randomDate("2020-01-23 16:00:00","2020-01-23 16:00:00"),
                'finished_at' =>$this->randomDate("2020-01-23 19:00:00","2020-01-23 19:00:00"),
                'abandoned' => false,
                'excuse' => null,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")   
            ],
            [
                'tournament_id' => 1,
                'player1'=> 7,
                'player2'=> 8,
                'winner_id' => 7,
                'round' => 'quarters',
                'started_at' =>$this->randomDate("2020-01-24 08:00:00","2020-01-24 08:00:00"),
                'finished_at' =>$this->randomDate("2020-01-24 11:00:00","2020-01-24 11:00:00"),
                'abandoned' => false,
                'excuse' => null,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")   
            ],
            [
                'tournament_id' => 1,
                'player1'=> 1,
                'player2'=> 4,
                'winner_id' => 1,
                'round' => 'semifinal',
                'started_at' =>$this->randomDate("2020-01-24 12:00:00","2020-01-24 12:00:00"),
                'finished_at' =>$this->randomDate("2020-01-24 15:00:00","2020-01-24 15:00:00"),
                'abandoned' => false,
                'excuse' => null,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")   
            ],
            [
                'tournament_id' => 1,
                'player1'=> 3,
                'player2'=> 7,
                'winner_id' => 3,
                'round' => 'semifinal',
                'started_at' =>$this->randomDate("2020-01-24 16:00:00","2020-01-24 16:00:00"),
                'finished_at' =>$this->randomDate("2020-01-24 19:00:00","2020-01-24 19:00:00"),
                'abandoned' => false,
                'excuse' => null,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")   
            ],
            [
                'tournament_id' => 1,
                'player1'=> 1,
                'player2'=> 3,
                'winner_id' => 1,
                'round' => 'final',
                'started_at' =>$this->randomDate("2020-01-25 16:00:00","2020-01-25 16:00:00"),
                'finished_at' =>$this->randomDate("2020-01-25 19:00:00","2020-01-25 19:00:00"),
                'abandoned' => false,
                'excuse' => null,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")   
            ],
        ];
        $t2 = 
        [
            [
                'tournament_id' => 2,
                'player1'=> 17,
                'player2'=> 22,
                'winner_id' => 17,
                'round' =>'fourth',
                'started_at' =>$this->randomDate("2020-01-20 10:00:00","2020-01-20 10:00:00"),
                'finished_at' =>$this->randomDate("2020-01-20 13:00:00","2020-01-20 13:00:00"),
                'abandoned' => false,
                'excuse' => null,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")   
            ],
            [
                'tournament_id' => 2,
                'player1'=> 28,
                'player2'=> 23,
                'winner_id' => 28,
                'round' => 'fourth',
                'started_at' =>$this->randomDate("2020-01-20 14:00:00","2020-01-20 14:00:00"),
                'finished_at' =>$this->randomDate("2020-01-20 17:00:00","2020-01-20 17:00:00"),
                'abandoned' => false,
                'excuse' => null,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")   
            ],
            [
                'tournament_id' => 2,
                'player1'=> 20,
                'player2'=> 24,
                'winner_id' => 20,
                'round' => 'fourth',
                'started_at' =>$this->randomDate("2020-01-21 08:00:00","2020-01-21 08:00:00"),
                'finished_at' =>$this->randomDate("2020-01-21 11:00:00","2020-01-20 11:00:00"),
                'abandoned' => false,
                'excuse' => null,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")   
            ],
            [
                'tournament_id' => 2,
                'player1'=> 30,
                'player2'=> 25,
                'winner_id' => 30,
                'round' => 'fourth',
                'started_at' =>$this->randomDate("2020-01-21 12:00:00","2020-01-20 12:00:00"),
                'finished_at' =>$this->randomDate("2020-01-21 15:00:00","2020-01-20 15:00:00"),
                'abandoned' => false,
                'excuse' => null,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")   
            ],
            [
                'tournament_id' => 2,
                'player1'=> 18,
                'player2'=> 26,
                'winner_id' => 18,
                'round' => 'fourth',
                'started_at' =>$this->randomDate("2020-01-21 15:00:00","2020-01-20 15:00:00"),
                'finished_at' =>$this->randomDate("2020-01-21 18:00:00","2020-01-20 18:00:00"),
                'abandoned' => false,
                'excuse' => null,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")   
            ],
            [
                'tournament_id' => 2,
                'player1'=> 32,
                'player2'=> 27,
                'winner_id' => 32,
                'round' => 'fourth',
                'started_at' =>$this->randomDate("2020-01-22 08:00:00","2020-01-22 08:00:00"),
                'finished_at' =>$this->randomDate("2020-01-22 11:00:00","2020-01-22 11:00:00"),
                'abandoned' => false,
                'excuse' => null,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")   
            ],
            [
                'tournament_id' => 2,
                'player1'=> 19,
                'player2'=> 31,
                'winner_id' => 19,
                'round' => 'fourth',
                'started_at' =>$this->randomDate("2020-01-22 12:00:00","2020-01-22 12:00:00"),
                'finished_at' =>$this->randomDate("2020-01-22 15:00:00","2020-01-22 15:00:00"),
                'abandoned' => false,
                'excuse' => null,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")   
            ],
            [
                'tournament_id' => 2,
                'player1'=> 21,
                'player2'=> 29,
                'winner_id' => 21,
                'round' => 'fourth',
                'started_at' =>$this->randomDate("2020-01-22 16:00:00","2020-01-22 16:00:00"),
                'finished_at' =>$this->randomDate("2020-01-22 19:00:00","2020-01-22 19:00:00"),
                'abandoned' => false,
                'excuse' => null,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")   
            ],
            [
                'tournament_id' => 2,
                'player1'=> 17,
                'player2'=> 28,
                'winner_id' => 17,
                'round' => 'quarters',
                'started_at' =>$this->randomDate("2020-01-23 08:00:00","2020-01-23 08:00:00"),
                'finished_at' =>$this->randomDate("2020-01-23 11:00:00","2020-01-23 11:00:00"),
                'abandoned' => false,
                'excuse' => null,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")   
            ],
            [
                'tournament_id' => 2,
                'player1'=> 20,
                'player2'=> 30,
                'winner_id' => 20,
                'round' => 'quarters',
                'started_at' =>$this->randomDate("2020-01-23 12:00:00","2020-01-23 12:00:00"),
                'finished_at' =>$this->randomDate("2020-01-23 15:00:00","2020-01-23 15:00:00"),
                'abandoned' => false,
                'excuse' => null,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")   
            ],
            [
                'tournament_id' => 2,
                'player1'=> 18,
                'player2'=> 19,
                'winner_id' => 18,
                'round' => 'quarters',
                'started_at' =>$this->randomDate("2020-01-23 16:00:00","2020-01-23 16:00:00"),
                'finished_at' =>$this->randomDate("2020-01-23 19:00:00","2020-01-23 19:00:00"),
                'abandoned' => false,
                'excuse' => null,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")   
            ],
            [
                'tournament_id' => 2,
                'player1'=> 32,
                'player2'=> 21,
                'winner_id' => 32,
                'round' => 'quarters',
                'started_at' =>$this->randomDate("2020-01-24 08:00:00","2020-01-24 08:00:00"),
                'finished_at' =>$this->randomDate("2020-01-24 11:00:00","2020-01-24 11:00:00"),
                'abandoned' => false,
                'excuse' => null,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")   
            ],
            [
                'tournament_id' => 2,
                'player1'=> 17,
                'player2'=> 20,
                'winner_id' => 20,
                'round' => 'semifinal',
                'started_at' =>$this->randomDate("2020-01-24 12:00:00","2020-01-24 12:00:00"),
                'finished_at' =>$this->randomDate("2020-01-24 15:00:00","2020-01-24 15:00:00"),
                'abandoned' => false,
                'excuse' => null,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")   
            ],
            [
                'tournament_id' => 2,
                'player1'=> 18,
                'player2'=> 32,
                'winner_id' => 32,
                'round' => 'semifinal',
                'started_at' =>$this->randomDate("2020-01-24 16:00:00","2020-01-24 16:00:00"),
                'finished_at' =>$this->randomDate("2020-01-24 19:00:00","2020-01-24 19:00:00"),
                'abandoned' => false,
                'excuse' => null,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")   
            ],
            [
                'tournament_id' => 2,
                'player1'=> 20,
                'player2'=> 32,
                'winner_id' => 20,
                'round' => 'final',
                'started_at' =>$this->randomDate("2020-01-25 16:00:00","2020-01-25 16:00:00"),
                'finished_at' =>$this->randomDate("2020-01-25 19:00:00","2020-01-25 19:00:00"),
                'abandoned' => false,
                'excuse' => null,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")   
            ],
        ];
        $t3=
        [
            [
                'tournament_id' => 3,
                'player1'=> 41,
                'player2'=> 42,
                'winner_id' => 41,
                'round' => 'semifinal',
                'started_at' =>$this->randomDate("2020-02-23 11:00:00","2020-02-23 11:00:00"),
                'finished_at' =>$this->randomDate("2020-02-23 15:00:00","2020-02-23 15:00:00"),
                'abandoned' => false,
                'excuse' => null,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'tournament_id' => 3,
                'player1'=> 43,
                'player2'=> 44,
                'winner_id' => 44,
                'round' => 'semifinal',
                'started_at' =>$this->randomDate("2020-02-24 11:00:00","2020-02-24 11:00:00"),
                'finished_at' =>$this->randomDate("2020-02-24 19:00:00","2020-02-24 19:00:00"),
                'abandoned' => false,
                'excuse' => null,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'tournament_id' => 3,
                'player1'=> 41,
                'player2'=> 44,
                'winner_id' => 41,
                'round' => 'final',
                'started_at' =>$this->randomDate("2020-02-25 11:00:00","2020-02-25 11:00:00"),
                'finished_at' =>$this->randomDate("2020-02-25 19:00:00","2020-02-25 19:00:00"),
                'abandoned' => false,
                'excuse' => null,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ]
        ];
        $t4=
        [
            [
                'tournament_id' => 4,
                'player1'=>33,
                'player2'=> 36,
                'winner_id' => 36,
                'round' => 'semifinal',
                'started_at' =>$this->randomDate("2020-02-20 11:00:00","2020-02-20 11:00:00"),
                'finished_at' =>$this->randomDate("2020-02-20 15:00:00","2020-02-20 15:00:00"),
                'abandoned' => false,
                'excuse' => null,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'tournament_id' => 4,
                'player1'=> 34,
                'player2'=> 35,
                'winner_id' => 34,
                'round' => 'semifinal',
                'started_at' =>$this->randomDate("2020-02-21 11:00:00","2020-02-21 11:00:00"),
                'finished_at' =>$this->randomDate("2020-02-21 15:00:00","2020-02-21 15:00:00"),
                'abandoned' => false,
                'excuse' => null,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'tournament_id' => 4,
                'player1'=> 36,
                'player2'=> 34,
                'winner_id' => 36,
                'round' => 'final',
                'started_at' =>$this->randomDate("2020-02-22 11:00:00","2020-02-22 11:00:00"),
                'finished_at' =>$this->randomDate("2020-02-22 15:00:00","2020-02-22 15:00:00"),
                'abandoned' => false,
                'excuse' => null,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ]
        ];
        $matches = array_merge($t1,$t2,$t3,$t4);
        DB::table('matches')->insert($matches);
    }
}
