<?php

use Illuminate\Database\Seeder;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        date_default_timezone_set('America/Mexico_City');
        DB::table('teams')->insert([
            [
                'name' => 'Djokovic-Berrettini',
                'category'=>'Male',
                'atpPoints'=>6540,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")   
            ],
            [
                'name' => 'Nadal-Zverev',
                'category'=>'Male',
                'atpPoints'=> 6740,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s") 
            ],
            [
                'name' => 'Thiem-Tsitsipas',
                'category'=>'Male',
                'atpPoints'=> 5895,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s") 
            ],
            [
                'name' => 'Federer-Medvedev',
                'category'=>'Male',
                'atpPoints'=> 6260,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'name' => 'Barty-Bencic',
                'category'=>'Female',
                'atpPoints'=> 6634,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'name' => 'Bertens-Halep',
                'category'=>'Female',
                'atpPoints'=> 5205 ,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s") 
            ],
            [
                'name' => 'Pliskova-Andreescu',
                'category'=>'Female',
                'atpPoints'=> 4880,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'name' => 'Kenin-Svitolina',
                'category'=>'Female',
                'atpPoints'=> 4585,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'name' => 'Federer-Williams',
                'category'=>'Mixed',
                'atpPoints'=> 5272,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'name' => 'Medvedev-Svitolina',
                'category'=>'Mixed',
                'atpPoints'=> 5235,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'name' => 'Berrettini-Andreescu',
                'category'=>'Mixed',
                'atpPoints'=> 3707,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'name' => 'Fognini-Sabalenka',
                'category'=>'Mixed',
                'atpPoints'=>3008 ,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
        ]);
    }
}
