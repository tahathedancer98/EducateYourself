<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormationUpdateRequest extends FormRequest
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
            'description' => 'required|string',
            'prix' => 'required|string|min:1|max:5',
            'type' => 'required|string',
            'user_id' => 'int',
            'checkboxCategories' => 'nullable'
        ];
    }
}
