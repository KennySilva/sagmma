<?php

namespace Sagmma\Http\Requests\SagmmaRequests;

use Sagmma\Http\Requests\Request;

class TypeofemployeesRequest extends Request
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name'        => 'min:4|max:128|required|unique:typeofemployees',
            'description' => 'min:4|max:250',
        ];
    }
}
