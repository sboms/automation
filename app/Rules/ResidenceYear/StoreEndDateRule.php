<?php

namespace App\Rules\ResidenceYear;

use App\Models\Resident;
use Illuminate\Contracts\Validation\Rule;

class StoreEndDateRule implements Rule
{
    public $residentId;
    public $specialtyId;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($residentId, $specialtyId)
    {
        $this->residentId = $residentId;
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
        $resident = Resident::find($this->residentId);
        $residentYears = $resident->ResidenceYear()->where('end_date',$value)->get();
        if ($residentYears->count()>0) {
            return false;
        }
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'للمقيم الحالي سنة إقامة انتهت في نفس التاريخ الذي تحاول إضافته الرجاء التأكد من صحة المعلمومات';
    }
}
