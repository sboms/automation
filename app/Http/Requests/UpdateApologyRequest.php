<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateApologyRequest extends FormRequest
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
            /** String */
            'comment'       => ['required', 'string', 'min:3'],
            'reason'       => ['required', 'string', 'min:3'],
            'explan'       => ['required', 'string', 'min:3'],
            /** Date */
            'date'   => ['nullable', 'date'],
            /** File */
            'allfile'         => ['nullable', 'mimes:pdf'],
        ];
    }
}