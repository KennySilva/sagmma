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
            'name'              => 'min   :4|max   :50|required',
            'nickname'          => 'min   :3|max   :20|required',
            'ic'                => 'size  :6|required|unique:employees',
            'nif'               => 'size  :11|required|unique:employees',
            'birth_date'        => 'required|date',
            'email'             => 'unique:employees|email',
            'phone'             => 'size  :7|unique:employees',
            'service_beginning' => 'date',
        ];
    }
}
