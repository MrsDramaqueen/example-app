<?php

namespace App\Http\Requests\Auth;

use App\Entity\DTO\Auth\RegisterUserDTO;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;


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
            //'class_id' => 'unique:users:class_id',
        ];
    }

    public function getRegisterDTO(): RegisterUserDTO
    {
        return (new RegisterUserDTO)
            ->setName($this->input('name'))
            ->setEmail($this->input('email'))
            ->setPassword($this->input('password'))
            //->setClassId($this->input('class_id'))
            ->setClassType($this->input('class_type'));
    }
}
