<?php

namespace App\Http\Requests\Client;

use App\Entity\DTO\Auth\RegisterUserDTO;
use App\Entity\DTO\Client\ClientStoreDTO;
use Illuminate\Foundation\Http\FormRequest;

class ClientRegisterRequest extends FormRequest
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
            'name' => 'required|string|min:1|max:255',
            'last_name' => 'required|string|min:1|max:255',
            'age' => 'required|integer|between:18, 85',
            'email' => 'required|string|min:1|max:255|unique:clients,email',
        ];
    }

    public function getRegisterDTO(): ClientStoreDTO
    {
        return (new ClientStoreDTO)
            ->setName($this->input('name'))
            ->setEmail($this->input('email'));
    }
}
