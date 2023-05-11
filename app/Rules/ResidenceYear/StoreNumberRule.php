<?php

namespace App\Rules\ResidenceYear;

use App\Models\Resident;
use App\Models\Specialty;
use Illuminate\Contracts\Validation\Rule;

class StoreNumberRule implements Rule
{
    public $residentId;
    public $specialtyId;
    public $myMessage;
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
        $specialty = Specialty::find($this->specialtyId);
        if ($value > $specialty->number_of_years) {
            $this->myMessage = 'ترتيب النسة التي تحاول إضافتها أكبر تماماً من عدد السنوات للاختصاص الحالي';
            return false;
        }
        $residentYears = $resident->ResidenceYear()->where([['number','=', $value],['specialty_id','=',$this->specialtyId]])->get();
        if ($residentYears->count() > 0) {
            $this->myMessage = 'لدي المقيم الحالي سنة إقامة بنفس الترتيب الذي تحاول إضافته ';
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
        return $this->myMessage;
    }
}
