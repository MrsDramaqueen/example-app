<?php

namespace App\Http\Requests\BakerBun;

use App\Entity\DTO\BakerBun\BakerBunCreateOrderDTO;
use Illuminate\Foundation\Http\FormRequest;

class BakerBunUpdateRequest extends FormRequest
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

    public function getCreateDTO(): BakerBunCreateOrderDTO
    {
        return (new BakerBunCreateOrderDTO)
            ->setName($this->input('name'))
            ->setType($this->input('type'))
            ->setClientId($this->input('client_id'))
            ->setBakerId($this->input('baker_id'));
    }
}
