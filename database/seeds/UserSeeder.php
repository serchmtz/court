<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        date_default_timezone_set('America/Mexico_City');
        
        DB::table('users')->insert([
        [
            'name' => 'Alfredo Siward',
            'email' => 'alfred.siward@gmail.com',
            'phone' => '202-555-0191',
            'role' => 'Global Admin',
            'password' => Hash::make('12345678'),
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ],
        [
            'name' => 'Burton Cipriano',
            'email' => 'burton.cipriano@gmail.com',
            'phone' => '314-472-6954',
            'role' => 'Tournament Manager',
            'password' => Hash::make('12345678'),
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ],
        [
            'name' => 'Diana Everild',
            'email' => 'diana.everild@gmail.com',
            'phone' => '480-438-3540',
            'role' => 'Secretary',
            'password' => Hash::make('12345678'),
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ],
        [
            'name' => 'Feliciana Ligeia',
            'email' => 'feliciana.ligelia@gmail.com',
            'phone' => '318-658-9808',
            'role' => 'Results Capturer',
            'password' => Hash::make('12345678'),
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ],
        [
            'name' => 'Novak Djokovic',
            'email' => 'novak.djokovic@gmail.com',
            'phone' => '941-423-0860',
            'role' => 'Player',
            'password' => Hash::make('12345678'),
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ],
        [
            'name' => 'Rafael Nadal',
            'email' => 'rafael.nadal@gmail.com',
            'phone' => '305-924-7545',
            'role' => 'Player',
            'password' => Hash::make('12345678'),
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ],
        [
            'name' => 'Dominic Thiem',
            'email' => 'dominic.thiem@gmail.com',
            'phone' => '931-237-9170',
            'role' => 'Player',
            'password' => Hash::make('12345678'),
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ],
        [
            'name' => 'Roger Federer',
            'email' => 'roger.federer@gmail.com',
            'phone' => '330-698-8848',
            'role' => 'Player',
            'password' => Hash::make('12345678'),
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ],
        [
            'name' => 'Daniil Medvedev',
            'email' => 'daniil.medvedev@gmail.com',
            'phone' => '407-715-0684',
            'role' => 'Player',
            'password' => Hash::make('12345678'),
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ],
        [
            'name' => 'Stefanos Tsitsipas',
            'email' => 'stefanos.tsitsipas@gmail.com',
            'phone' => '786-545-2155',
            'role' => 'Player',
            'password' => Hash::make('12345678'),
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ],
        [
            'name' => 'Alexander Zverev',
            'email' => 'alexander.zverev@gmail.com',
            'phone' => '858-763-3290',
            'role' => 'Player',
            'password' => Hash::make('12345678'),
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ],
        [
            'name' => 'Matteo Berrettini',
            'email' => 'matteo.berrettini@gmail.com',
            'phone' => '203-494-9312',
            'role' => 'Player',
            'password' => Hash::make('12345678'),
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ],
        [
            'name' => 'Gael Monfils',
            'email' => 'gael.monfils@gmail.com',
            'phone' => '615-687-1973',
            'role' => 'Player',
            'password' => Hash::make('12345678'),
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ],
        [
            'name' => 'David Goffin',
            'email' => 'david.goffin@gmail.com',
            'phone' => '662-871-1133',
            'role' => 'Player',
            'password' => Hash::make('12345678'),
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ],
        [
            'name' => 'Fabio Fognini',
            'email' => 'fabio.fognini@gmail.com',
            'phone' => '503-425-1913',
            'role' => 'Player',
            'password' => Hash::make('12345678'),
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ],
        [
            'name' => 'Roberto Bautista Agut',
            'email' => 'roberto.bautista@gmail.com',
            'phone' => '217-696-9518',
            'role' => 'Player',
            'password' => Hash::make('12345678'),
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ],
        [
            'name' => 'Diego Schwartzman',
            'email' => 'diego.schwartzman@gmail.com',
            'phone' => '336-280-5702',
            'role' => 'Player',
            'password' => Hash::make('12345678'),
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ],
        [
            'name' => 'Andrey Rublev',
            'email' => 'andrev.rublev@gmail.com',
            'phone' => '928-810-8957',
            'role' => 'Player',
            'password' => Hash::make('12345678'),
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ],
        [
            'name' => 'Karen Khachanov',
            'email' => 'karen.khachanov@gmail.com',
            'phone' => '234-709-6911',
            'role' => 'Player',
            'password' => Hash::make('12345678'),
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ],
        [
            'name' => 'Denis Shapovalov',
            'email' => 'denis.shapovalov@gmail.com',
            'phone' => '203-701-6911',
            'role' => 'Player',
            'password' => Hash::make('12345678'),
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ],
        [
            'name' => 'Ashleigh Barty',
            'email' => 'ashleigh.barty@gmail.com',
            'phone' => '360-948-2090',
            'role' => 'Player',
            'password' => Hash::make('12345678'),
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ],
        [
            'name' => 'Simona Halep',
            'email' => 'simona.halep@gmail.com',
            'phone' => '318-562-1165',
            'role' => 'Player',
            'password' => Hash::make('12345678'),
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ],
        [
            'name' => 'Karolina Pliskova',
            'email' => 'karolina.pliskova@gmail.com',
            'phone' => '402-541-8841',
            'role' => 'Player',
            'password' => Hash::make('12345678'),
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ],
        [
            'name' => 'Sofia Kenin',
            'email' => 'sofia.kenin@gmail.com',
            'phone' => '757-472-7534',
            'role' => 'Player',
            'password' => Hash::make('12345678'),
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ],
        [
            'name' => 'Elina Svitolina',
            'email' => 'elina.svitolina@gmail.com',
            'phone' => '740-974-4285',
            'role' => 'Player',
            'password' => Hash::make('12345678'),
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ],
        [
            'name' => 'Bianca Andreescu',
            'email' => 'biana.andreescu@gmail.com',
            'phone' => '505-951-1473',
            'role' => 'Player',
            'password' => Hash::make('12345678'),
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ],
        [
            'name' => 'Kiki Bertens',
            'email' => 'kiki.bertens@gmail.com',
            'phone' => '818-571-7584',
            'role' => 'Player',
            'password' => Hash::make('12345678'),
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ],
        [
            'name' => 'Belinda Bencic',
            'email' => 'belinda.bencic@gmail.com',
            'phone' => '909-352-3769',
            'role' => 'Player',
            'password' => Hash::make('12345678'),
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ],
        [
            'name' => 'Serena Williams',
            'email' => 'serena.williams@gmail.com',
            'phone' => '210-836-9121',
            'role' => 'Player',
            'password' => Hash::make('12345678'),
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ],
        [
            'name' => 'Naomi Osaka',
            'email' => 'naomi.osaka@gmail.com',
            'phone' => '616-956-3008',
            'role' => 'Player',
            'password' => Hash::make('12345678'),
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ],
        [
            'name' => 'Aryna Sabalenka',
            'email' => 'aryna.sabalenka@gmail.com',
            'phone' => '615-780-5864',
            'role' => 'Player',
            'password' => Hash::make('12345678'),
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ],
        [
            'name' => 'Petra Kvitova',
            'email' => 'petra.kvitova@gmail.com',
            'phone' => '210-489-8389',
            'role' => 'Player',
            'password' => Hash::make('12345678'),
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ],
        [
            'name' => 'Madison Keys',
            'email' => 'madison.keys@gmail.com',
            'phone' => '704-869-5771',
            'role' => 'Player',
            'password' => Hash::make('12345678'),
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ],
        [
            'name' => 'Johanna Konta',
            'email' => 'johanna.konta@gmail.com',
            'phone' => '951-221-6962',
            'role' => 'Player',
            'password' => Hash::make('12345678'),
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ],
        [
            'name' => 'Petra Martic',
            'email' => 'Petra.martic@gmail.com',
            'phone' => '937-505-5046',
            'role' => 'Player',
            'password' => Hash::make('12345678'),
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ],
        [
            'name' => 'Garbine Muguruza',
            'email' => 'garbine.muguruza@gmail.com',
            'phone' => '864-245-4041',
            'role' => 'Player',
            'password' => Hash::make('12345678'),
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ],
        ]);
    }
}
