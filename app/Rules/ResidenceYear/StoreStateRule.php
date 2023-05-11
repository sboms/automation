<?php

namespace App\Rules\ResidenceYear;

use App\Models\Resident;
use Illuminate\Contracts\Validation\Rule;

class StoreStateRule implements Rule
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
        if ($value == 'قبول')
        {
            $resident = Resident::find($this->residentId);
            $residentYears = $resident->ResidenceYear()->where(['state','=','قبول'],['specialty_id','=',$this->specialtyId])->get();
            if ($residentYears->count() > 0)
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
        return 'لدى المقيم الحالي سنة قبول الرجاء التأكد من معلومات المقيم والمحاولة لاحقاً.';
    }
}
