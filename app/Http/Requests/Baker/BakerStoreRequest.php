<?php

namespace App\Http\Requests\Baker;

use Illuminate\Foundation\Http\FormRequest;

class BakerStoreRequest extends FormRequest
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
     * @return array
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|min:1|max:255',
            'lastName' => 'required|string|min:1|max:255',
        ];
    }

    public function messages(): array
    {
        return [
            'name' => 'A name is required',
            'lastName' => 'A last name is required',
        ];
    }
}
