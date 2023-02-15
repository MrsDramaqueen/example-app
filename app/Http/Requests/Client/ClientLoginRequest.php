<?php

namespace App\Http\Requests\Client;

use App\Entity\DTO\Client\ClientLoginDTO;
use Illuminate\Foundation\Http\FormRequest;

class ClientLoginRequest extends FormRequest
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
            'email' => 'required|string',
            'password' => 'required|string',
        ];
    }

    public function getLoginDTO(): ClientLoginDTO
    {
        return (new ClientLoginDTO)
            ->setEmail($this->input('email'))
            ->setPassword($this->input('password'));
    }
}
