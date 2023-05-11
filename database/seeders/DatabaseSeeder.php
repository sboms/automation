<?php

namespace Database\Seeders;

use App\Models\Specialty;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call([
            SpecialtySeeder::class,
            RoleSeeder::class,
            UserSeeder::class,
            VacationSeeder::class,
            ResidentSeeder::class,
            PenaltySeeder::class,
            ExamCenterSeeder::class,
            PermissionSeeder::class,
            SuperAdminSeeder::class,
        ]);
    }
}