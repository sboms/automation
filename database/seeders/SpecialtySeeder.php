<?php

namespace Database\Seeders;

use App\Models\Specialty;
use Illuminate\Database\Seeder;

class SpecialtySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Specialty::create([
            'name'=> "طب الطوارئ",
            'number_of_years'=>"4" ,
            'code'=> "ERM",
            'type' => "عام",
        ]);
        Specialty::create([
            'name'=> "طب مخبري",
            'number_of_years'=>"4" ,
            'code'=> "LAB",
            'type' => "عام",
        ]);
        Specialty::create([
            'name'=> "الأمراض الجلدية",
            'number_of_years'=>"4" ,
            'code'=> "DER",
            'type' => "عام",
        ]);
        Specialty::create([
            'name'=> "طب الأشعة",
            'number_of_years'=>"4" ,
            'code'=> "RXA",
            'type' => "عام",
        ]);
        Specialty::create([
            'name'=> "اذن انف حنجرة",
            'number_of_years'=>"4" ,
            'code'=> "ENT",
            'type' => "عام",
        ]);
        Specialty::create([
            'name'=> "جراحة عينية",
            'number_of_years'=>"4" ,
            'code'=> "OPS",
            'type' => "عام",
        ]);
    }
}
