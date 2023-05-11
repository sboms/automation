<?php

namespace App\Http\Requests\ResidenceYear;

use App\Rules\ResidenceYear\StoreEndDateRule;
use App\Rules\ResidenceYear\StoreNumberRule;
use App\Rules\ResidenceYear\StoreStartDateRule;
use App\Rules\ResidenceYear\StoreStateRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreResidenceYearRequest extends FormRequest
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
            'number'        => ['required',new StoreNumberRule($this->resident_id ,$this->specialty_id)],
            'state'         => ['required',new StoreStateRule($this->resident_id ,$this->specialty_id)],
            'comment'       => ['nullable','string'],
            'start_date'    => ['required','date',new StoreStartDateRule($this->resident_id ,$this->specialty_id)],
            'end_date'      => ['nullable','date','after:start_date',new StoreEndDateRule($this->resident_id ,$this->specialty_id)],
            'resident_id'   => ['required','exists:residents,id'],
            'specialty_id'  => ['required','exists:specialties,id'],
        ];
    }

    public function messages()
    {
        return [

        ];
    }
}
