<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class OpcineTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {

        $data = [
            [
                "rkpid" => 35280,
                "naziv" => "Općina Stankovci",
                "adresa" => "Stankovci 230",
                "mjesto" => "23422 Stankovci",
                "zupanija" => "Zadarska županija",
                "homepage" => "https://www.stankovci.hr",
                "oib" => "13734771602",
                "url" => "opcina-stankovci",
                "grb" => "grb-opcina-stankovci.jpg",
                "favico" => "ico-opcina-stankovci.jpg",
                "background" => "img/pozadina-stankovci.jpg",
                "description" => ""
            ],
            [
                "rkpid" => 37164,
                "naziv" => "Općina Podcrkavlje",
                "adresa" => "Trg 108. brigade ZNG 11",
                "mjesto" => "35201 Podcrkavlje",
                "zupanija" => "Brodsko-posavska županija",
                "homepage" => "https://www.podcrkavlje.hr",
                "oib" => "39613161208",
                "url" => "opcina-podcrkavlje",
                "grb" => "grb-opcina-podcrkavlje.jpg",
                "favico" => "ico-opcina-podcrkavlje.jpg",
                "background" => "img/pozadina-podcrkavlje.jpg",
                "description" => ""
            ],
            // ... add the other entries in the same format
        ];

        // Now, you can use DB::table() to insert the data:
        DB::table('opcine')->insert($data);
    }
}
