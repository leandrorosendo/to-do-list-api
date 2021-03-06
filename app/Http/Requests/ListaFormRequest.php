<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Lista;

class ListaFormRequest extends FormRequest
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
        ];
    }
    
}