<?php

namespace Sagmma\Http\Requests\SagmmaRequests;

use Sagmma\Http\Requests\Request;

class TradersRequest extends Request
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [

            'name'  => 'required|max:60|min:4',
            'ic'    => 'required|digits:6|Integer|unique:traders',
            'email' => 'unique:traders|email',
            'phone' => 'digits:7|unique:traders',
        ];
    }
}
