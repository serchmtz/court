<?php

use Illuminate\Database\Seeder;

class PlayerSeeder extends Seeder
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
        DB::table('players')->insert([
            [
                'user_id' => 5,
                'country'=>'Serbia',
                'atpPoints'=> 10220 ,
                'birthday' => $this->randomDate("1975-01-01", "1996-01-01"),
                'photo'=>'storage/playerpictures/novadjokovic.png',
                'sex'=>'M',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'user_id' => 6,
                'country'=>'Spain',
                'atpPoints'=> 9850 ,
                'birthday' => $this->randomDate("1975-01-01", "1996-01-01"),
                'photo'=>'storage/playerpictures/rafaelnadal.png',
                'sex'=>'M',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'user_id' => 7,
                'country'=>'Austria',
                'atpPoints'=> 7045 ,
                'birthday' => $this->randomDate("1975-01-01", "1996-01-01"),
                'photo'=>'storage/playerpictures/dominicthiem.png',
                'sex'=>'M',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'user_id' => 8,
                'country'=>'Switzerland',
                'atpPoints'=> 6630 ,
                'birthday' => $this->randomDate("1975-01-01", "1996-01-01"),
                'photo'=>'storage/playerpictures/rogerfederer.png',
                'sex'=>'M',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'user_id' => 9,
                'country'=>'Russia',
                'atpPoints'=> 5890 ,
                'birthday' => $this->randomDate("1975-01-01", "1996-01-01"),
                'photo'=>'storage/playerpictures/daniilmedvedev.png',
                'sex'=>'M',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'user_id' => 10,
                'country'=>'Greece',
                'atpPoints'=> 4745 ,
                'birthday' => $this->randomDate("1975-01-01", "1996-01-01"),
                'photo'=>'storage/playerpictures/stefanostsitsipas.png',
                'sex'=>'M',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'user_id' => 11,
                'country'=>'Germany',
                'atpPoints'=> 3630 ,
                'birthday' => $this->randomDate("1975-01-01", "1996-01-01"),
                'photo'=>'storage/playerpictures/alexanderzverev.png',
                'sex'=>'M',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'user_id' => 12,
                'country'=>'Italy',
                'atpPoints'=> 2860 ,
                'birthday' => $this->randomDate("1975-01-01", "1996-01-01"),
                'photo'=>'storage/playerpictures/matteoberrettini.png',
                'sex'=>'M',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'user_id' => 13,
                'country'=>'France',
                'atpPoints'=> 2860 ,
                'birthday' => $this->randomDate("1975-01-01", "1996-01-01"),
                'photo'=>'storage/playerpictures/gaelmonfils.png',
                'sex'=>'M',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'user_id' => 14,
                'country'=>'Belgium',
                'atpPoints'=> 2555 ,
                'birthday' => $this->randomDate("1975-01-01", "1996-01-01"),
                'photo'=>'storage/playerpictures/davidgoffin.png',
                'sex'=>'M',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'user_id' => 15,
                'country'=>'Italy',
                'atpPoints'=> 2400 ,
                'birthday' => $this->randomDate("1975-01-01", "1996-01-01"),
                'photo'=>'storage/playerpictures/fabiofognini.png',
                'sex'=>'M',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'user_id' => 16,
                'country'=>'Spain',
                'atpPoints'=> 2360 ,
                'birthday' => $this->randomDate("1975-01-01", "1996-01-01"),
                'photo'=>'storage/playerpictures/robertobautistaagut.png',
                'sex'=>'M',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'user_id' => 17,
                'country'=>'Argentina',
                'atpPoints'=> 2265 ,
                'birthday' => $this->randomDate("1975-01-01", "1996-01-01"),
                'photo'=>'storage/playerpictures/diegoschwartzman.png',
                'sex'=>'M',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'user_id' => 18,
                'country'=>'Russia',
                'atpPoints'=> 2234 ,
                'birthday' => $this->randomDate("1975-01-01", "1996-01-01"),
                'photo'=>'storage/playerpictures/andreyrublev.png',
                'sex'=>'M',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'user_id' => 19,
                'country'=>'Russia',
                'atpPoints'=> 2120 ,
                'birthday' => $this->randomDate("1975-01-01", "1996-01-01"),
                'photo'=>'storage/playerpictures/karenkhachanov.png',
                'sex'=>'M',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'user_id' => 20,
                'country'=>'Canada',
                'atpPoints'=> 2075 ,
                'birthday' => $this->randomDate("1975-01-01", "1996-01-01"),
                'photo'=>'storage/playerpictures/denisshapovalov.png',
                'sex'=>'M',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'user_id' => 21,
                'country'=>'Australia',
                'atpPoints'=> 8717 ,
                'birthday' => $this->randomDate("1975-01-01", "1996-01-01"),
                'photo'=>'storage/playerpictures/ashleighbarty.png',
                'sex'=>'F',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'user_id' => 22,
                'country'=>'Romania',
                'atpPoints'=> 6076 ,
                'birthday' => $this->randomDate("1975-01-01", "1996-01-01"),
                'photo'=>'storage/playerpictures/simonahalep.png',
                'sex'=>'F',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'user_id' => 23,
                'country'=>'Czech Republic',
                'atpPoints'=> 5205 ,
                'birthday' => $this->randomDate("1975-01-01", "1996-01-01"),
                'photo'=>'storage/playerpictures/karolinapliskova.png',
                'sex'=>'F',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'user_id' => 24,
                'country'=>'USA',
                'atpPoints'=> 4590 ,
                'birthday' => $this->randomDate("1975-01-01", "1996-01-01"),
                'photo'=>'storage/playerpictures/sofiakenin.png',
                'sex'=>'F',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'user_id' => 25,
                'country'=>'Ukraine',
                'atpPoints'=> 4580 ,
                'birthday' => $this->randomDate("1975-01-01", "1996-01-01"),
                'photo'=>'storage/playerpictures/elinasvitolina.png',
                'sex'=>'F',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'user_id' => 26,
                'country'=>'Canada',
                'atpPoints'=> 4555 ,
                'birthday' => $this->randomDate("1975-01-01", "1996-01-01"),
                'photo'=>'storage/playerpictures/biancaandreescu.png',
                'sex'=>'F',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'user_id' => 27,
                'country'=>'Netherlands',
                'atpPoints'=> 4335 ,
                'birthday' => $this->randomDate("1975-01-01", "1996-01-01"),
                'photo'=>'storage/playerpictures/kikibertens.png',
                'sex'=>'F',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'user_id' => 28,
                'country'=>'Switzerland',
                'atpPoints'=> 4010 ,
                'birthday' => $this->randomDate("1975-01-01", "1996-01-01"),
                'photo'=>'storage/playerpictures/belindabencic.png',
                'sex'=>'F',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'user_id' => 29,
                'country'=>'USA',
                'atpPoints'=> 3915 ,
                'birthday' => $this->randomDate("1975-01-01", "1996-01-01"),
                'photo'=>'storage/playerpictures/serenawilliams.png',
                'sex'=>'F',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'user_id' => 30,
                'country'=>'Japan',
                'atpPoints'=> 3625 ,
                'birthday' => $this->randomDate("1975-01-01", "1996-01-01"),
                'photo'=>'storage/playerpictures/naomiosaka.png',
                'sex'=>'F',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'user_id' => 31,
                'country'=>'Belarus',
                'atpPoints'=> 3615 ,
                'birthday' => $this->randomDate("1975-01-01", "1996-01-01"),
                'photo'=>'storage/playerpictures/arynasabalenka.png',
                'sex'=>'F',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'user_id' => 32,
                'country'=>'Czech Republic',
                'atpPoints'=> 3566 ,
                'birthday' => $this->randomDate("1975-01-01", "1996-01-01"),
                'photo'=>'storage/playerpictures/petrakvitova.png',
                'sex'=>'F',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'user_id' => 33,
                'country'=>'USA',
                'atpPoints'=> 2962 ,
                'birthday' => $this->randomDate("1975-01-01", "1996-01-01"),
                'photo'=>'storage/playerpictures/madisonkeys.png',
                'sex'=>'F',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'user_id' => 34,
                'country'=>'Great Britain',
                'atpPoints'=> 2803 ,
                'birthday' => $this->randomDate("1975-01-01", "1996-01-01"),
                'photo'=>'storage/playerpictures/johannakonta.png',
                'sex'=>'F',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'user_id' => 35,
                'country'=>'Croatia',
                'atpPoints'=> 2770 ,
                'birthday' => $this->randomDate("1975-01-01", "1996-01-01"),
                'photo'=>'storage/playerpictures/petramartic.png',
                'sex'=>'F',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'user_id' => 36,
                'country'=>'Spain',
                'atpPoints'=> 2711 ,
                'birthday' => $this->randomDate("1975-01-01", "1996-01-01"),
                'photo'=>'storage/playerpictures/garbinemuguruza.png',
                'sex'=>'F',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
        ]);
    }
}