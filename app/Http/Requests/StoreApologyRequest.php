<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreApologyRequest extends FormRequest
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
            /**String */
            'reason' => ['required', 'string', 'min:3'],
            'explan' => ['nullable', 'string', 'min:3'],
            'comment' => ['nullable', 'string', 'min:3'],
            /**Boolean */
            'state' => ['boolean'],
            /**Date */
            'date' => ['required', 'date'],
            /** File */
            'allfile'         => ['required', 'mimes:pdf', 'max:10000'],
        ];
    }
}
