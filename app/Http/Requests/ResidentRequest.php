<?php

namespace App\Http\Requests;

use App\Rules\RegistrationNumberRule;
use Illuminate\Foundation\Http\FormRequest;

class ResidentRequest extends FormRequest
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
        //dd($this->specialty_id);
        return [
            /** String */
            'name'       => ['required','string','min:3'],
            'email'      => ['required','string','unique:users,email,'.$this->id,'email'],
            'password'   => ['required','string',],
            'last_name'  => ['required','string','min:3'],
            'father'     => ['required','string','min:3'],
            'mother'     => ['required','string','min:3'],
            'birthplace' => ['required','string','min:3'],
            'name_en'    => ['nullable','string'],
            'father_en'  => ['nullable','string'],
            'mother_en'  => ['nullable','string'],
            'livingplace'=> ['nullable','string'],
            /** Number */
            'graduation_result'=> ['nullable'],
            'phone'            => ['required','min:3'],
            /** Date */
            'graduation_year'   => ['nullable','date'],
            'registration_date' => ['nullable','date'],
            'birthdate'         => ['required','date','min:3'],
            'start_training'    => ['nullable','date'],
            /**Status */
            'p_status'  => ['required'],
            'status'    => ['required'],
            /**Model */
            'specialty_id' => ['required','exists:specialties,id'],
            'year_id'      => ['exists:years,id'],
            /**Condition */
            'start_previous_training'   => ['required_if:p_status,مقيم سابق,أنهى التدريب'],
            'end_previous_training'     => ['required_if:p_status,مقيم سابق,أنهى التدريب'],
            'year'                   =>['required_if:status,مقيم'],
            'final_exam'                =>['required_if:first_exam,on'],
            /** Boolean */
            // 'first_exam' => ['boolean'],
            // 'final_exam' => ['boolean'],
            'gender'     => ['required'],
            /** File */
            'training_document'         => ['nullable','mimes:jpeg,jpg,png','max:10000'],
            'personal_picture'          => ['nullable','mimes:jpeg,jpg,png','max:10000'],
            'university_degree'         => ['nullable','mimes:jpeg,jpg,png','max:10000'],
            'graduation_notice'         => ['nullable','mimes:jpeg,jpg,png','max:10000'],
            'id_card'                   => ['nullable','mimes:jpeg,jpg,png','max:10000'],
            'syndication_document'      => ['nullable','mimes:jpeg,jpg,png','max:10000'],
            'practicing_profession'     => ['nullable','mimes:jpeg,jpg,png','max:10000'],
            /**Castum Validation */
            'registration_number' => [new RegistrationNumberRule($this->specialty_id)],
        ];
    }
}
