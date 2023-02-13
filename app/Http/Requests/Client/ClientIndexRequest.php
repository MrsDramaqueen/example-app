<?php

namespace App\Http\Requests\Client;

use App\Entity\DTO\Client\ClientIndexDTO;
use Illuminate\Foundation\Http\FormRequest;

class ClientIndexRequest extends FormRequest
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

    public function getIndexDTO(): ClientIndexDTO
    {
        return (new ClientIndexDTO)
            ->setName($this->input('name'))
            ->setLastName($this->input('last_name'))
            ->setAge($this->input('age'));
    }
}
