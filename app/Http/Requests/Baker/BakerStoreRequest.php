<?php

namespace App\Http\Requests\Baker;

use App\Entity\DTO\Baker\BakerStoreDTO;
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
            'email' => 'required|string|min:1|max:255|unique:bakers,email',
            'last_name' => 'required|string|min:1|max:255',
            'age' => 'required|integer|between:18, 85',
        ];
    }

    public function messages(): array
    {
        return [
            'name' => 'A name is required',
            'last_name' => 'A last name is required',
            'age' => 'An age is required',
        ];
    }

    /**
     * @return BakerStoreDTO
     */
    public function getStoreDTO(): BakerStoreDTO
    {
      return (new BakerStoreDTO)
            ->setAge($this->input('age'))
            ->setLastName($this->input('last_name'))
            ->setName($this->input('name'))
            ->setEmail($this->input('email'));
    }
}
