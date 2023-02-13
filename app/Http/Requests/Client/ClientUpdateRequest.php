<?php

namespace App\Http\Requests\Client;

use App\Entity\DTO\Client\ClientUpdateDTO;
use Illuminate\Foundation\Http\FormRequest;

class ClientUpdateRequest extends FormRequest
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
            //
        ];
    }

    public function getUpdateDTO(): ClientUpdateDTO
    {
        return (new ClientUpdateDTO)
            ->setName($this->input('name'))
            ->setLastName($this->input('last_name'))
            ->setAge($this->input('age'));
    }
}
