<?php

namespace App\Http\Requests\Baker;

use App\Entity\DTO\Baker\BakerStoreDTO;
use App\Entity\DTO\Baker\BakerUpdateDTO;
use App\Http\Controllers\Baker\BakerController;
use App\Models\Baker;
use Illuminate\Foundation\Http\FormRequest;

class BakerUpdateRequest extends FormRequest
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
        ];
    }

    /**
     * @return BakerUpdateDTO
     */
    public function getUpdateDTO(): BakerUpdateDTO
    {
        return (new BakerUpdateDTO)
        ->setName($this->input('name'))
        ->setLastName($this->input('last_name'))
        ->setAge($this->input('age'));
    }
}
