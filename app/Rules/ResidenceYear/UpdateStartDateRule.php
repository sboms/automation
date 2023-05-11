<?php

namespace App\Rules\ResidenceYear;

use App\Models\Resident;
use Illuminate\Contracts\Validation\Rule;

class UpdateStartDateRule implements Rule
{
    public $residentId;
    public $specialtyId;
    public $residenceYearId;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($residentId, $specialtyId, $residenceYearId)
    {
        $this->residentId = $residentId;
        $this->specialtyId = $specialtyId;
        $this->residenceYearId =$residenceYearId;
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
        $resident = Resident::find($this->residentId);
        $residentYears = $resident->ResidenceYear()->where([['id','!=',$this->residenceYearId],['start_date','=',$value]])->count();

        if ($residentYears>0) {
            return false;
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
        return 'للمقيم الحالي سنة إقامة بدأت في نفس التاريخ الذي تحاول إضافته الرجاء التأكد من صحة المعلمومات';
    }
}
