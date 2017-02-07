<?php

namespace Sagmma\Http\Requests\SagmmaRequests;

use Sagmma\Http\Requests\Request;

class EmployeesRequest extends Request
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name'              => 'required|max:60|min:4',
            'ic'                => 'required|digits:6|Integer|unique:users',
            'email'             => 'unique:employees|email',
            'phone'             => 'digits:7|unique:employees',
            'service_beginning' => 'date',
        ];
    }
}
