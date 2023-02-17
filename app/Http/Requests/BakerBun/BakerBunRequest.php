<?php

namespace App\Http\Requests\BakerBun;

use App\Entity\DTO\BakerBun\BakerBunCreateOrderDTO;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class BakerBunRequest extends FormRequest
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
            'name' => 'required|string|min:1|max:255|exists:buns',
            'type' => 'required|string|min:1|max:255|exists:buns',
            //'client_id' => 'required|integer|exists:clients,id',
            'baker_id' => 'required|integer|exists:bakers,id',
        ];
    }

    public function getCreateDTO(): BakerBunCreateOrderDTO
    {
        return (new BakerBunCreateOrderDTO)
            ->setName($this->input('name'))
            ->setType($this->input('type'))
            ->setClientId(Auth::id())
            ->setBakerId($this->input('baker_id'));
    }
}
