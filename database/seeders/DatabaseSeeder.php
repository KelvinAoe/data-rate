<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Rate;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Rate::truncate();
        $file = File::files($path);
        echo $file;
        $csvFile =fopen(base_path("/database/data/exchange-rates.csv"),"r");
        $firstline = true ;

        while(($data = fgetcsv($csvFile,5000,",")) !==FALSE){
            if(!$firstline){
                Rate::create([
                    "date" =>$data['0'],
                    "code" =>$data['1']
                ]
                );
                $firstline = false;
            }
            fclose($csvFile);
        }
    }
}