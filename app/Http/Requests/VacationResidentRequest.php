<?php

namespace App\Http\Requests;

use App\Rules\VacationResidentRule;
use Illuminate\Foundation\Http\FormRequest;

class VacationResidentRequest extends FormRequest
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
            'vacation' => [new VacationResidentRule($this->vacation, $this->resident, $this->specialty)]
        ];
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The validation error message.';
    }
}
