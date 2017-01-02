<?php

namespace simuaagua\Http\Requests;

use simuaagua\Http\Requests\Request;

class MedidorRequest extends Request
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
            'id'=>'required|numeric|unique:medidores,id',
            'diametro_id'=>'required',
            'lectura'=>'required|numeric',

        ];
    }
}
