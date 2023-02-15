<?php

namespace App\Http\Requests\Auth;

use App\Entity\DTO\Auth\RegisterUserDTO;
use Illuminate\Foundation\Http\FormRequest;


class AuthRequest extends FormRequest
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
            'email' => 'required|string|min:1|max:255|unique:users,email',
            'password' => 'required|string|confirmed',
        ];
    }

    public function getRegisterDTO(): RegisterUserDTO
    {
        return (new RegisterUserDTO)
            ->setName($this->input('name'))
            ->setEmail($this->input('email'))
            ->setPassword($this->input('password'));
    }
}
