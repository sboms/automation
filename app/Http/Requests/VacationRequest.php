<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VacationRequest extends FormRequest
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
            'name'              => ['required','unique:vacations,name,'.$this->id.',name'],
            'maxday'            => ['required','numeric'],
            'maxdayinyear'      => ['nullable','numeric'],
            'repetition'        => ['nullable'],
            'salarydeduction'   => ['nullable'],
            'recompense'        => ['nullable'],
        ];
    }

}
