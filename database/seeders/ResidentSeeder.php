<?php

namespace Database\Seeders;

use App\Models\ResidenceYear;
use App\Models\Resident;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Nette\Utils\Random;

class ResidentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $gender = collect(['ذكر', 'أنثى']);
        $specialty = collect([1, 2, 3, 4, 5, 6]);
        $status = collect(['مقيم', 'أنهى التدريب']);
        /**مقيم */
        for ($i = 0; $i < 10; $i++) {
            $specialtyid = $specialty->random();

            $user = User::create([
                'name'              => 'مقيم ' . $i,
                'email'             => $i . 'resident@sbomd.org',
                'last_name'         => 'عائلة 1',
                'gender'            => $gender->random(),
                'phone'             => '5362486481',
                'father'            => 'أب ' . $i,
                'mother'            => 'أم ' . $i,
                'birthplace'        => 'مدينة',
                'password'          => Hash::make('123456789'),
                'email_verified_at' => date(now()),
                'birthdate'         => '1/1/1996'
            ]);
            /**Create Resident thate relationship with user */
            $resident = Resident::create([
                'status'                => 'مقيم',
                'name_en'               => 'name EN' . $i,
                'father_en'             => 'father_en' . $i,
                'mother_en'             => 'mother_en' . $i,
                'livingplace'           => 'livingplace',
                'graduation_result'     => '80',
                'graduation_year'       => date(now()),
                'registration_date'     => date(now()),
                'p_status'              => 'طالب طب',
                'personal_picture'      => null,
                'university_degree'     => null,
                'graduation_notice'     => null,
                'id_card'               => null,
                'syndication_document'  => null,
                'practicing_profession' => null,
                'user_id'               => $user->id,
            ]);
            /**Add reasident to specilty */
            $resident->Specialties()->attach($specialtyid, [
                'registration_date'         => '1/1/2021',
                'registration_number'       => $i,
                'status'                    => 'مقيم',
                'start_training'            => '1/1/2021',
                'end_training'              => null,
                'training_document'         => null,
                'first_exam'                => true,
                'final_exam'                => true,
                'start_previous_training'   => null,
                'end_previous_training'     => null,
            ]);
            /** Set  ResidenceYear */
            ResidenceYear::create([
                'name' => 'الأولى',
                'number' => '1',
                'state' => 'إقامة',
                'start_date' => date(now()),
                'resident_id'   => $resident->id,
                'specialty_id'  => $specialtyid,
            ]);
        }
        /**أنهى التدريب غير معفى */
        for ($i = 10; $i < 20; $i++) {
            $specialtyid = $specialty->random();

            $user = User::create([
                'name'              => 'مقيم ' . $i,
                'email'             => $i . 'resident@sbomd.org',
                'last_name'         => 'عائلة 1',
                'gender'            => $gender->random(),
                'phone'             => '5362486481',
                'father'            => 'أب ' . $i,
                'mother'            => 'أم ' . $i,
                'birthplace'        => 'مدينة',
                'password'          => Hash::make('123456789'),
                'email_verified_at' => date(now()),
                'birthdate'         => '1/1/1996'
            ]);
            /**Create Resident thate relationship with user */
            $resident = Resident::create([
                'status'                => 'مقيم',
                'name_en'               => 'name EN' . $i,
                'father_en'             => 'father_en' . $i,
                'mother_en'             => 'mother_en' . $i,
                'livingplace'           => 'livingplace',
                'graduation_result'     => '80',
                'graduation_year'       => date(now()),
                'registration_date'     => date(now()),
                'p_status'              => 'طالب طب',
                'personal_picture'      => null,
                'university_degree'     => null,
                'graduation_notice'     => null,
                'id_card'               => null,
                'syndication_document'  => null,
                'practicing_profession' => null,
                'user_id'               => $user->id,
            ]);
            /**Add reasident to specilty */
            $resident->Specialties()->attach($specialtyid, [
                'registration_date'         => '1/1/2021',
                'registration_number'       => $i,
                'status'                    => 'أنهى التدريب',
                'start_training'            => '1/1/2021',
                'end_training'              => null,
                'training_document'         => null,
                'first_exam'                => false,
                'final_exam'                => true,
                'start_previous_training'   => null,
                'end_previous_training'     => null,
            ]);
            /** Set  ResidenceYear */
            ResidenceYear::create([
                'name' => 'الأولى',
                'number' => '1',
                'state' => 'إقامة',
                'start_date' => date(now()),
                'resident_id'   => $resident->id,
                'specialty_id'  => $specialtyid,
            ]);
        }
        /**أنهى التدريب  معفى */
        for ($i = 20; $i < 30; $i++) {
            $specialtyid = $specialty->random();

            $user = User::create([
                'name'              => 'مقيم ' . $i,
                'email'             => $i . 'resident@sbomd.org',
                'last_name'         => 'عائلة 1',
                'gender'            => $gender->random(),
                'phone'             => '5362486481',
                'father'            => 'أب ' . $i,
                'mother'            => 'أم ' . $i,
                'birthplace'        => 'مدينة',
                'password'          => Hash::make('123456789'),
                'email_verified_at' => date(now()),
                'birthdate'         => '1/1/1996'
            ]);
            /**Create Resident thate relationship with user */
            $resident = Resident::create([
                'status'                => 'مقيم',
                'name_en'               => 'name EN' . $i,
                'father_en'             => 'father_en' . $i,
                'mother_en'             => 'mother_en' . $i,
                'livingplace'           => 'livingplace',
                'graduation_result'     => '80',
                'graduation_year'       => date(now()),
                'registration_date'     => date(now()),
                'p_status'              => 'طالب طب',
                'personal_picture'      => null,
                'university_degree'     => null,
                'graduation_notice'     => null,
                'id_card'               => null,
                'syndication_document'  => null,
                'practicing_profession' => null,
                'user_id'               => $user->id,
            ]);
            /**Add reasident to specilty */
            $resident->Specialties()->attach($specialtyid, [
                'registration_date'         => '1/1/2021',
                'registration_number'       => $i,
                'status'                    => 'أنهى التدريب',
                'start_training'            => '1/1/2021',
                'end_training'              => null,
                'training_document'         => null,
                'first_exam'                => false,
                'final_exam'                => false,
                'start_previous_training'   => null,
                'end_previous_training'     => null,
            ]);
            /** Set  ResidenceYear */
            ResidenceYear::create([
                'name' => 'الأولى',
                'number' => '1',
                'state' => 'إقامة',
                'start_date' => date(now()),
                'resident_id'   => $resident->id,
                'specialty_id'  => $specialtyid,
            ]);
        }
    }
}
