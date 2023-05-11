<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ResidentRequest;
use App\Models\ResidenceYear;
use App\Models\Resident;
use App\Models\Specialty;
use App\Models\User;
use App\Models\Year;
use Auth;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Storage;

class ResidentController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->hasPermissionTo('عرض كل المقيمين')) {
            $residents = Resident::all();
            return view('admin.resident.index', compact('residents'));
        }
        return redirect()->back()->with('erorr', 'لا تملك الصلاحية لزيارة هذه الصفحة');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::user()->hasPermissionTo('إضافة مقيم')) {
            $specialties = Specialty::all();
            return view('admin.resident.add', compact('specialties'));
        }
        return redirect()->back()->with('erorr', 'لا تملك الصلاحية لزيارة هذه الصفحة');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ResidentRequest $request)
    {
        if (Auth::user()->hasPermissionTo('إضافة مقيم')) {
            // try {

            DB::beginTransaction();

            /** Add the missing values to the Request */
            if (!$request->has('first_exam')) {
                $request->merge(['first_exam' => false]);
            }
            if (!$request->has('final_exam')) {
                $request->merge(['final_exam' => false]);
            }
            $first_exam = $request->first_exam == 'on' ?  $request->first_exam = true : false;
            $final_exam = $request->final_exam == 'on' ?  $request->final_exam = true : false;

            /**find Specialty using id parameter */
            $specialty = Specialty::find($request->specialty_id);

            /** Upload image */
            // $personal_picture       = $request->personal_picture != null ? UploadImage('residents/personal_picture', $request->personal_picture) : null;
            // $university_degree      = $request->university_degree != null ? UploadImage('residents/university_degree', $request->university_degree) : null;
            // $graduation_notice      = $request->graduation_notice != null ? UploadImage('residents/graduation_notice', $request->graduation_notice) : null;
            // $id_card                = $request->id_card != null ? UploadImage('residents/id_card', $request->id_card) : null;
            // $syndication_document   = $request->syndication_document != null ? UploadImage('residents/syndication_document', $request->syndication_document) : null;
            // $practicing_profession  = $request->practicing_profession != null ? UploadImage('residents/practicing_profession', $request->practicing_profession) : null;
            // $training_document      = $request->training_document != null ? UploadImage('residents/training_document', $request->training_document) : null;
            // /** Add registration_number To Resident */
            $registration_number = 0;
            if ($request->registration_number != null) {
                $registration_number = $request->registration_number;
            } else {
                $registration_number = $this->getRegistrationNumber($specialty);
            }
            /**create user */
            $user = User::create([
                'name'              => $request->name,
                'email'             => $request->email,
                'last_name'         => $request->last_name,
                'gender'            => $request->gender,
                'phone'             => $request->phone,
                'father'            => $request->father,
                'mother'            => $request->mother,
                'birthplace'        => $request->birthplace,
                'password'          => Hash::make($request->password),
                'email_verified_at' => date(now()),
                'birthdate'         => $request->birthdate
            ]);
            /**Create Resident thate relationship with user */
            $resident = Resident::create([
                'status'                => $request->status,
                'name_en'               => $request->name_en,
                'father_en'             => $request->father_en,
                'mother_en'             => $request->mother_en,
                'livingplace'           => $request->livingplace,
                'graduation_result'     => $request->graduation_result,
                'graduation_year'       => $request->graduation_year,
                'registration_date'     => $request->registration_date,
                'p_status'              => $request->p_status,
                'user_id'               => $user->id,
            ]);

            /** Upload image */
            if ($request->file('personal_picture') != null) {
                $resident->personal_picture = $request->file('personal_picture')->store('Resident/personal_picture', 'public');;
            }
            if ($request->file('university_degree') != null) {
                $resident->university_degree = $request->file('university_degree')->store('Resident/university_degree', 'public');;
            }
            if ($request->file('graduation_notice') != null) {
                $resident->graduation_notice = $request->file('graduation_notice')->store('Resident/graduation_notice', 'public');;
            }
            if ($request->file('id_card') != null) {
                $resident->id_card = $request->file('id_card')->store('Resident/id_card', 'public');;
            }
            if ($request->file('syndication_document') != null) {
                $resident->syndication_document = $request->file('syndication_document')->store('Resident/syndication_document', 'public');;
            }
            if ($request->file('practicing_profession') != null) {
                $resident->practicing_profession = $request->file('practicing_profession')->store('Resident/practicing_profession', 'public');;
            }
            if ($request->file('training_document') != null) {
                $training_document = $request->file('training_document')->store('Resident/training_document', 'public');;
            }
            $resident->save();

            /**Add reasident to specilty */
            $resident->Specialties()->attach($specialty->id, [
                'registration_date'         => $request->registration_date,
                'registration_number'       => $registration_number,
                'status'                    => $request->status,
                'start_training'            => $request->start_training,
                'end_training'              => $request->end_training,
                'training_document'         => $training_document,
                'first_exam'                => $first_exam,
                'final_exam'                => $final_exam,
                'start_previous_training'   => $request->start_previous_training,
                'end_previous_training'     => $request->end_previous_training,
            ]);
            /**check if the resident status is أنهى التدريب */
            if ($request->status != 'أنهى التدريب') {
                /** Set  ResidenceYear */
                ResidenceYear::create([
                    'name' => $this->getYearName($request->year),
                    'number' => $request->year,
                    'state' => $request->state,
                    'start_date' => $request->start_date,
                    'resident_id'   => $resident->id,
                    'specialty_id'  => $specialty->id,
                ]);
            }
            DB::commit();
            if ($request->p_status == 'مقيم سابق' || $request->p_status == 'أنهى التدريب') {
                //dd("frgrfr");
                return redirect()->route('previousTraining.create', ['residentId' => $resident->id]);
            }
            return redirect()->back()->with(['success' => 'تمت إضافة المقيم بنجاح']);
            // } catch (Exception $e) {
            //     DB::rollback();
            //     return redirect()->back()->with(['error' => 'حدث خطا ما الرجاء مارجعة القسم التقني و المحاوله لاحقا']);
            // }
        }
        return redirect()->back()->with('erorr', 'لا تملك الصلاحية لزيارة هذه الصفحة');
    }

    /**
     * Display the specified resource.
     *
     * @param  Resident  $resident
     * @return \Illuminate\Http\Response
     */
    public function show(Resident  $resident)
    {
        return view('admin.resident.profile', compact('resident'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Resident  $resident
     * @return \Illuminate\Http\Response
     */
    public function edit(Resident  $resident)
    {
        if (Auth::user()->hasPermissionTo('تعديل معلومات مقيم')) {
            return view('admin.resident.edit', compact('resident'));
        }
        return redirect()->back()->with('erorr', 'لا تملك الصلاحية لزيارة هذه الصفحة');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Resident  $resident
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Resident  $resident)
    {
        if (Auth::user()->hasPermissionTo('تعديل معلومات مقيم')) {
            try {

                DB::beginTransaction();
                $user = $resident->User()->first();
                $user->name = $request->name;
                $user->last_name = $request->last_name;
                $user->father = $request->father;
                $user->mother = $request->mother;
                $user->email = $request->email;
                $user->phone = $request->phone;
                $user->gender = $request->gender;
                $user->birthdate = $request->birthdate;
                $user->birthplace = $request->birthplace;
                $resident->livingplace = $request->livingplace;
                $resident->name_en = $request->name_en;
                $resident->father_en = $request->father_en;
                $resident->mother_en = $request->mother_en;
                if ($request->password) {
                    $user->password = Hash::make($request->password);
                }
                if ($request->file('personal_picture') != null) {
                    try {
                        Storage::disk('public')->delete($resident->personal_picture);
                    } catch (Exception $e) {
                    }
                    $resident->personal_picture = $request->file('personal_picture')->store('Resident/personal_picture', 'public');;
                }
                if ($request->file('university_degree') != null) {
                    try {
                        Storage::disk('public')->delete($resident->university_degree);
                    } catch (Exception $e) {
                    }
                    $resident->university_degree = $request->file('university_degree')->store('Resident/university_degree', 'public');;
                }
                if ($request->file('graduation_notice') != null) {
                    try {
                        Storage::disk('public')->delete($resident->graduation_notice);
                    } catch (Exception $e) {
                    }
                    $resident->graduation_notice = $request->file('graduation_notice')->store('Resident/graduation_notice', 'public');;
                }
                if ($request->file('id_card') != null) {
                    try {
                        Storage::disk('public')->delete($resident->id_card);
                    } catch (Exception $e) {
                    }
                    $resident->id_card = $request->file('id_card')->store('Resident/id_card', 'public');;
                }
                if ($request->file('syndication_document') != null) {
                    try {
                        Storage::disk('public')->delete($resident->syndication_document);
                    } catch (Exception $e) {
                    }
                    $resident->syndication_document = $request->file('syndication_document')->store('Resident/syndication_document', 'public');;
                }
                if ($request->file('practicing_profession') != null) {
                    try {
                        Storage::disk('public')->delete($resident->practicing_profession);
                    } catch (Exception $e) {
                    }
                    $resident->practicing_profession = $request->file('practicing_profession')->store('Resident/practicing_profession', 'public');;
                }
                $user->save();
                $resident->save();
                DB::commit();
                return redirect()->back()->with('success', 'تم تعديل معلومات المقيم بنجاح');
            } catch (Exception $e) {
                DB::rollback();
                return redirect()->back()->with(['error' => 'حدث خطا ما الرجاء مارجعة القسم التقني و المحاوله لاحقا']);
            }
        }
        return redirect()->back()->with('erorr', 'لا تملك الصلاحية لزيارة هذه الصفحة');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    /**
     * Get unique number for resident in specialty.
     *
     * @param  Specialty  $specialty
     * @return Number
     */
    public function getRegistrationNumber(Specialty $specialty)
    {
        $registrationNumber = $specialty->Residents()->max('registration_number');
        if ($registrationNumber != null) {
            $registrationNumber += 1;
        } else {
            $registrationNumber = 1;
        }
        return $registrationNumber;
    }
    /**
     * Get Year Name
     *
     * @param  int  $number
     * @return string
     */
    public function getYearName($num)
    {
        if ($num == 1) {
            return "الأولى";
        } elseif ($num == 2) {
            return "الثانية";
        } elseif ($num == 3) {
            return "الثالثة";
        } elseif ($num == 4) {
            return "الرابعة";
        } elseif ($num == 5) {
            return "الخامسة";
        } elseif ($num == 6) {
            return "السادسة";
        } else {
            return "السابعة";
        }
    }
}
