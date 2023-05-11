<?php

namespace Database\Seeders;

use App\Models\Penalty;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PenaltySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Penalty::create([
            'name' => 'عقوبة التنبيه المسجل',
            'count' => null,
            'residence_effect' => false,
        ]);
        Penalty::create([
            'name' => 'عقوبة الإنذار',
            'count' => null,
            'residence_effect' => false,
        ]);
        Penalty::create([
            'name' => 'عقوبة تمديد فترة الإقامة',
            'count' => null,
            'residence_effect' => true,
        ]);
        Penalty::create([
            'name' => 'عقوبة الحسم',
            'count' => '',
            'residence_effect' => false,
        ]);
    }
}
