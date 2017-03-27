<?php

namespace Sagmma\Http\Requests\SagmmaRequests;

use Sagmma\Http\Requests\Request;

class TypeofplacesRequest extends Request
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        //  'Regex:^\(\d{3}\)-\d{4}-\d{4}$,

        return [
            'name' => 'min:4|max:45|required|string|unique:typeofplaces,name,'.$this->id,
            // 'name' =>  ['required', 'max:54', 'min:4', 'unique:typeofplaces,name,'.$this->id, 'Regex: /^\d{4}-\d{4}$/'],

            'description' => 'min:8|max:250|string'
        ];
    }
}
