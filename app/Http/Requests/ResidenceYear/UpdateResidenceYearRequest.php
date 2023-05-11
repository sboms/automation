<?php

namespace App\Http\Requests\ResidenceYear;

use App\Rules\ResidenceYear\UpdateEndDateRule;
use App\Rules\ResidenceYear\UpdateNumberRule;
use App\Rules\ResidenceYear\UpdateStartDateRule;
use App\Rules\ResidenceYear\UpdateStateRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateResidenceYearRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        
        return [
            'number'        => ['required',new UpdateNumberRule($this->resident_id ,$this->specialty_id,$this->residenceYear_id)],
            'state'         => ['required',new UpdateStateRule($this->resident_id ,$this->specialty_id,$this->residenceYear_id)],
            'comment'       => ['nullable','string'],
            'start_date'    => ['required','date',new UpdateStartDateRule($this->resident_id ,$this->specialty_id,$this->residenceYear_id)],
            'end_date'      => ['nullable','date','after:start_date',new UpdateEndDateRule($this->resident_id ,$this->specialty_id,$this->residenceYear_id)],
            'resident_id'   => ['required','exists:residents,id'],
            'specialty_id'  => ['required','exists:specialties,id'],
        ];
    }
}
