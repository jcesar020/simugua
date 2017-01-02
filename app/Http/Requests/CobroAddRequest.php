<?php

namespace simuaagua\Http\Requests;

use simuaagua\Http\Requests\Request;

class CobroAddRequest extends Request
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
    /*
    public function rules()
    {
        return [
            'factura_id'=>'required|unique:cobrotemp|exists:facturas,id',
            'usuario_id'=>'required',
            'fecha'=>'required',

        ];
    }
    */
    public function rules()
    {
        return [
            'factura_id'=>'required',
            'usuario_id'=>'required',
            'fecha'=>'required',

        ];
    }


}
