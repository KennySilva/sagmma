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
            'name'              => 'required|max:60|min:4',
            'ic'                => 'required|digits:6|Integer|unique:traders,ic,'.$this->id,
            'email'             => 'email|unique:traders,email,'.$this->id,
            'phone'             => 'digits:7|unique:traders,phone,'.$this->id,
        ];
    }
}
