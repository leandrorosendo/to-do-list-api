<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Lista;

class ListaFormRequestUpdate extends FormRequest
{


    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if (is_numeric($this->lista) && Lista::find($this->lista)) {
            return true;
        }
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'ds_lista' => "required|max:250|unique:listas,ds_lista,{$this->route('lista')}",
            'usuario_id' => 'required|integer|exists:usuarios,id',
            'fl_realizado' => 'required|boolean'
        ];
    }
}
