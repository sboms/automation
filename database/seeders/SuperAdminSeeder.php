<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name'              => "محمد",
            'email'             => "admin@sboms.org",
            'last_name'         => "عيسى",
            'gender'            => "ذكر",
            'phone'             => "05370273099",
            'father'            => "مأمون",
            'mother'            => "عائشة",
            'birthplace'        => "حمورة",
            'password'          => Hash::make("M0h@Mad199o"),
            'email_verified_at' => date(now()),
            'birthdate'         => "20-1-1996",
            'workplace'         => "عازي عنتاب",
        ]);
        $user->assignRole("Super Admin");
        $permissions = Permission::all();
        $role = Role::findByName('Super Admin');
        $role->syncPermissions($permissions);

        $user = User::create([
            'name'              => "فايز",
            'email'             => "exams@sboms.org",
            'last_name'         => "عرابي",
            'gender'            => "ذكر",
            'phone'             => "05370273099",
            'father'            => "فتحي",
            'mother'            => "فتحية",
            'birthplace'        => "جوبر",
            'password'          => Hash::make("exams@sboms.org"),
            'email_verified_at' => date(now()),
            'birthdate'         => "20-1-1996",
            'workplace'         => "عازي عنتاب",
        ]);
        $user->assignRole("Super Admin");
        $permissions = Permission::all();
        $role = Role::findByName('Super Admin');
        $role->syncPermissions($permissions);
    }
}