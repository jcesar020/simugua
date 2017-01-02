<?php

namespace simuaagua\Http\Requests;

use simuaagua\Http\Requests\Request;

class facturarParametros extends Request
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
            'periodo'=>'required',
            'sector_id'=>'required',
            'desde'=>'required',
            'hasta'=>'required'
        ];
    }
}
