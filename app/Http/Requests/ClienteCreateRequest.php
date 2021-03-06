<?php

namespace simuaagua\Http\Requests;

use simuaagua\Http\Requests\Request;

class ClienteCreateRequest extends Request
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
            'nombre'=>'required|max:150',
            'apellido'=>'required|max:150',
            'direccion'=>'required',
            'email'=>'email',
            'tipo'=>'required',
        ];
    }
}
