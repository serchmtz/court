 <?php

use Illuminate\Database\Seeder;

class MemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        date_default_timezone_set('America/Mexico_City');
        DB::table('members')->insert([
            [
                'team_id' => 1,
                'player_id'=> 1,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")   
            ],
            [
                'team_id' => 1,
                'player_id'=> 8,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")   
            ],
            [
                'team_id' => 2,
                'player_id'=> 2,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")   
            ],
            [
                'team_id' => 2,
                'player_id'=> 7,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")   
            ],
            [
                'team_id' => 3,
                'player_id'=> 3,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")   
            ],
            [
                'team_id' => 3,
                'player_id'=> 6,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")   
            ],
            [
                'team_id' => 4,
                'player_id'=> 4,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")   
            ],
            [
                'team_id' => 4,
                'player_id'=> 5,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")   
            ],
            [
                'team_id' => 5,
                'player_id'=> 17,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")   
            ],
            [
                'team_id' => 5,
                'player_id'=> 24,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")   
            ],
            [
                'team_id' => 6,
                'player_id'=> 18,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")   
            ],
            [
                'team_id' => 6,
                'player_id'=> 23,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")   
            ],
            [
                'team_id' => 7,
                'player_id'=> 19,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")   
            ],
            [
                'team_id' => 7,
                'player_id'=> 22,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")   
            ],
            [
                'team_id' => 8,
                'player_id'=> 20,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")   
            ],
            [
                'team_id' => 8,
                'player_id'=> 21,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")   
            ],
            [
                'team_id' => 9,
                'player_id'=> 4,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")   
            ],
            [
                'team_id' => 9,
                'player_id'=> 25,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")   
            ],
            [
                'team_id' => 10,
                'player_id'=> 5,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")   
            ],
            [
                'team_id' => 10,
                'player_id'=> 21,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")   
            ],
            [
                'team_id' => 11,
                'player_id'=> 8,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")   
            ],
            [
                'team_id' => 11,
                'player_id'=> 22,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")   
            ],
            [
                'team_id' => 12,
                'player_id'=> 11,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")   
            ],
            [
                'team_id' => 12,
                'player_id'=> 27,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")   
            ],
        ]);
    }
}
