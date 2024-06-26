<?php

namespace App\Http\Requests\Baker;

use App\Entity\DTO\Baker\BakerIndexDTO;
use App\Entity\DTO\Baker\BakerStoreDTO;
use Illuminate\Foundation\Http\FormRequest;

class BakerIndexRequest extends FormRequest
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

    /**
     * @return BakerIndexDTO
     */
    public function getIndexDTO(): BakerIndexDTO
    {
        return (new BakerIndexDTO())
            ->setAge($this->input('age'))
            ->setLastName($this->input('last_name'))
            ->setName($this->input('name'));
    }
}
