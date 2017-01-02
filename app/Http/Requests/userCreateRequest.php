<?php

namespace simuaagua\Http\Requests;

use simuaagua\Http\Requests\Request;

class userCreateRequest extends Request
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
            'usuario',
            'name'=>'required',
            'email'=>'required|unique:users',
            'password'=>'required',
        ];
    }
}
