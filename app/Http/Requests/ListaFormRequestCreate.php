<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ListaFormRequestCreate extends FormRequest
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
            'ds_lista' => 'required|unique:listas|max:250',
            'usuario_id' => 'required|integer|exists:usuarios,id',
            'fl_realizado' => 'required|boolean'
        ];
    }

}