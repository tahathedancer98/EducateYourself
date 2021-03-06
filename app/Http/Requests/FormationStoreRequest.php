<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormationStoreRequest extends FormRequest
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
            'nom' => 'required|string|min:5|max:25',
            'presentation' => 'required|string|min:1',
            'duree' => 'required|int',
            'description' => 'required|string|min:1|max:250',
            'prix' => 'required|string|min:1|max:5',
            'type' => 'required|string|min:1',
            'image' => 'image',
            'user_id' => 'int',
            'checkboxCategories' => 'nullable',
            'checkboxChapitres' => 'nullable'
        ];
    }
}
