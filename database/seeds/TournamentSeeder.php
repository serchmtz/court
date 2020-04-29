<?php

use Illuminate\Database\Seeder;

class TournamentSeeder extends Seeder
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
        DB::table('tournaments')->insert([
            [
                'name' => 'Australian Open',
                'date'=> $this->randomDate("2020-01-20 08:00:00","2020-01-20 08:00:00"),
                'category' => 'Male',
                'competition' => 'Singles',
                'nRounds' => 4,
                'location' => 'Melbourne,Australia',    
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")    
            ],
            [
                'name' => 'Australian Open',
                'date'=> $this->randomDate("2020-01-20 08:00:00","2020-01-20 08:00:00"),
                'category' => 'Female',
                'competition' => 'Singles',
                'nRounds' => 4,
                'location' => 'Melbourne, Australia',    
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")     
            ],
            [
                'name' => 'Qatar Total Open 2020',
                'date'=> $this->randomDate("2020-02-23 09:00:00","2020-02-23 09:00:00"),
                'category' => 'Mixed',
                'competition' => 'Doubles',
                'nRounds' => 2,
                'location' => 'Melbourne, Australia',    
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")     
            ],
            [
                'name' => 'ABN AMRO World Tennis Tournament',
                'date'=> $this->randomDate("2020-02-20 10:00:00","2020-02-20 10:00:00"),
                'category' => 'Male',
                'competition' => 'Doubles',
                'nRounds' => 2,
                'location' => 'Rotterdam, Netherlands',    
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")     
            ],
        ]);
    }
}
