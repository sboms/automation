<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        for ($i = 0; $i < 10; $i++) {
            $user = User::create([
                'name'              => "سكرتير " . $i,
                'email'             => "s" . $i . "@sboms.org",
                'last_name'         => "العائلة",
                'gender'            => "ذكر",
                'phone'             => "05370273099",
                'father'            => "الأب",
                'mother'            => "الأم",
                'birthplace'        => "مكان الولادة",
                'password'          => Hash::make("m.isa@sboms.org"),
                'email_verified_at' => date(now()),
                'birthdate'         => "20-1-1996",
                'workplace'         => "مكان العمل",
            ]);
            $user->assignRole(9);
        }
        for ($i = 0; $i < 3; $i++) {
            $user = User::create([
                'name'              => "رئيس مجلس علمي " . $i,
                'email'             => "m" . $i . "@sboms.org",
                'last_name'         => "العائلة",
                'gender'            => "ذكر",
                'phone'             => "05370273099",
                'father'            => "الأب",
                'mother'            => "الأم",
                'birthplace'        => "مكان الولادة",
                'password'          => Hash::make("m.isa@sboms.org"),
                'email_verified_at' => date(now()),
                'birthdate'         => "20-1-1996",
                'workplace'         => "مكان العمل",
            ]);
            $user->assignRole(6);
        }
        for ($i = 0; $i < 15; $i++) {
            $user = User::create([
                'name'              => "عضو مجلس علمي " . $i,
                'email'             => "h" . $i . "@sboms.org",
                'last_name'         => "العائلة",
                'gender'            => "ذكر",
                'phone'             => "05370273099",
                'father'            => "الأب",
                'mother'            => "الأم",
                'birthplace'        => "مكان الولادة",
                'password'          => Hash::make("m.isa@sboms.org"),
                'email_verified_at' => date(now()),
                'birthdate'         => "20-1-1996",
                'workplace'         => "مكان العمل",
            ]);
            $user->assignRole(7);
        }
    }
}
