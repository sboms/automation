<?php

namespace Database\Seeders;

use App\Models\Vacation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VacationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Vacation::create([
            'name' => 'إدارية مدفوعة',
            'maxday' => '15',
            'maxdayinyear' => '15',
            'repetition' => true,
            'salarydeduction' => true,
            'recompense' => true,
        ]);
        Vacation::create([
            'name' => 'إصابة العمل',
            'maxday' => '30',
            'maxdayinyear' => null,
            'repetition' => true,
            'salarydeduction' => true,
            'recompense' => true,
        ]);
        Vacation::create([
            'name' => 'إصابات خارج العمل',
            'maxday' => '30',
            'maxdayinyear' => null,
            'repetition' => true,
            'salarydeduction' => false,
            'recompense' => true,
        ]);
        Vacation::create([
            'name' => 'إدارية غير مدفوعة',
            'maxday' => '30',
            'maxdayinyear' => '30',
            'repetition' => true,
            'salarydeduction' => false,
            'recompense' => false   ,
        ]);
        Vacation::create([
            'name' => 'زواج',
            'maxday' => '7',
            'maxdayinyear' => '7',
            'repetition' => false,
            'salarydeduction' => true,
            'recompense' => true,
        ]);
        Vacation::create([
            'name' => 'الوفاة',
            'maxday' => '5',
            'maxdayinyear' => null,
            'repetition' => true,
            'salarydeduction' => true,
            'recompense' => true,
        ]);
        Vacation::create([
            'name' => 'حج مدفوعة',
            'maxday' => '30',
            'maxdayinyear' => '30',
            'repetition' => false,
            'salarydeduction' => true,
            'recompense' => false,
        ]);
        Vacation::create([
            'name' => 'عمرة',
            'maxday' => '12',
            'maxdayinyear' => '12',
            'repetition' => false,
            'salarydeduction' => true,
            'recompense' => true,
        ]);
        Vacation::create([
            'name' => 'أمومة مدفوعة',
            'maxday' => '30',
            'maxdayinyear' => null,
            'repetition' => true,
            'salarydeduction' => true,
            'recompense' => false,
        ]);
        Vacation::create([
            'name' => 'ولادة الزوجة',
            'maxday' => '2',
            'maxdayinyear' => null,
            'repetition' => true,
            'salarydeduction' => true,
            'recompense' => true,
        ]);
        Vacation::create([
            'name' => 'دراسية',
            'maxday' => '14',
            'maxdayinyear' => null,
            'repetition' => true,
            'salarydeduction' => true,
            'recompense' => true,
        ]);
        Vacation::create([
            'name' => 'العيدين',
            'maxday' => '4',
            'maxdayinyear' => null,
            'repetition' => true,
            'salarydeduction' => true,
            'recompense' => true,
        ]);
        Vacation::create([
            'name' => 'علمية',
            'maxday' => '15',
            'maxdayinyear' => '15',
            'repetition' => true,
            'salarydeduction' => true,
            'recompense' => true,
        ]);
    }
}
