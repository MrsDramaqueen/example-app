<?php

namespace App\Http\Requests\Bun;

use App\Entity\DTO\Bun\BunIndexDTO;
use Illuminate\Foundation\Http\FormRequest;

class BunStoreRequest extends FormRequest
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
    public function rules()
    {
        return [
            'name' => 'required|unique:buns|string|min:1|max:255',
            'type' => 'required|string|min:1|max:255',

        ];
    }

    public function getStoreDTO(): BunIndexDTO
    {
        return (new BunIndexDTO)
        ->setName($this->input('name'))
        ->setType($this->input('type'));
    }
}
