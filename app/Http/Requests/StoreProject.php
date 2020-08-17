<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProject extends FormRequest
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
            'title' => 'required',
            'methodology_id' => 'required',
            'date_init' => 'required',
            'date_end' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Insira um título para o projeto.',
            'methodology_id.required' => 'Selecione uma Metodologia.',
            'date_init.required' => 'Insira a data de início.',
            'date_end.required' => 'Insira a data de fim.',
        ];
    }
}
