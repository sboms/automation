<?php

namespace App\Rules;

use App\Models\Specialty;
use Illuminate\Contracts\Validation\Rule;

class RegistrationNumberRule implements Rule
{
    public $specialtyId;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($specialtyId)
    {
        $this->specialtyId = $specialtyId;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        if($value != null)
        {
            $specialty=Specialty::find($this->specialtyId);
            $cuRegistrationNumber=$specialty->Residents()->wherePivot('registration_number',$value)->first();
            //dd($cuRegistrationNumber);
            if ($cuRegistrationNumber == null)
            {
                return true;
            }
            else
            {
                return false;
            }

        }
        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'رقم التسجيل المدخل تم ادخاله مسبقاً الرجاء التأكد من رقم التسجيل أو تركه فارغاً';
    }
}
