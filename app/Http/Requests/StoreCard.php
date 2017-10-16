<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCard extends FormRequest
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
            'name' => 'required|string',
            'cardset' => 'required|string',
            'type' => 'required|string',
            'rarity' => 'required|string',
            'cost' => 'required|integer',
            'attack' => 'required|integer',
            'health' => 'required|integer',
            'playerclass' => 'required|string',
            'img' => 'required|string'
        ];
    }
}
