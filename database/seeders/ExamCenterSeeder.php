<?php

namespace Database\Seeders;

use App\Models\ExamCenter;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ExamCenterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ExamCenter::create([
            'name' => 'المكتب الرئيسي',
            'place' => 'غازي عنتاب',
            'type' => 'مكتب',
        ]);
        ExamCenter::create([
            'name' => 'مكتب مارع',
            'place' => 'مارع',
            'type' => 'مكتب',
        ]);
        ExamCenter::create([
            'name' => 'مكتب ادلب',
            'place' => 'مديرية الصحة',
            'type' => 'مكتب',
        ]);
    }
}
