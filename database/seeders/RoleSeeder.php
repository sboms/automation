<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'name' => 'مدير العام',
        ]);
        Role::create([
            'name' => 'مدير إداري',
        ]);
        Role::create([
            'name' => 'عضو مجلس إدارة',
        ]);
        Role::create([
            'name' => 'رئيس دائرة الامتحانات',
        ]);
        Role::create([
            'name' => 'مسؤول امتحانات',
        ]);
        Role::create([
            'name' => 'رئيس مجلس علمي',
        ]);
        Role::create([
            'name' => 'عضو مجلس علمي',
        ]);
        Role::create([
            'name' => 'مسؤول تقني',
        ]);
        Role::create([
            'name' => 'سكرتاريا',
        ]);
        Role::create([
            'name' => 'مقيم',
        ]);
        Role::create([
            'name' => 'Super Admin',
        ]);
    }
}