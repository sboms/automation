<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SpecialtyRequest extends FormRequest
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
        //dd($this->id);
        return [
            'name'             => ['required','string','min:3'],
            'code'             => ['required','string','max:5','unique:specialties,code,'.$this->id],
            'number_of_years'  => ['required','int','min:2','max:7'],
        ];
    }
    public function messages()
    {
        return [
            'name.required' =>'الاسم الاختصاص مطلوب ',
            'name.string' =>'الاسم يجب أن يكون نص ',
            'name.min' =>'لا يمكن أن يكون الاسم أقل من ثلاث أحرف',
            'code.required' =>'رمز الاختصاص مطلوب ',
            'code.string' =>'يجب أن يكون الإيميل نص ',
            'code.unique' =>'هذا الرمز مستخدم مسبقاً الرجاء التأكدم من صحة الرمز ',
            'code.max' =>'لا يمكن أن يكون الرمز أكثر من 5 أحرف ',
            'number_of_years.int' =>'عدد سنوات الاختصاص يجب أن يكون رقم ',
            'number_of_years.min' =>' لا يمكن ان يكون عدد سنوات الإختصاص أقل من 2  ',
            'number_of_years.max' =>'لا يمكن أن يكون عدد سنوات الاختصاص أكثر من 7 ',
            'number_of_years.required' =>'عدد سنوات الاختصاص مطلوب',
        ];
    }
}
