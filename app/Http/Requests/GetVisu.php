<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GetVisu extends FormRequest
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
            // 'artifacts' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'artifacts.required' => 'Selecione pelo menos um artefato.',
        ];
    }
}
