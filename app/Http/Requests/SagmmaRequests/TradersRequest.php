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
            'name'            => 'min:4|max:50|required',
            'nickname'        => 'min:2|max:20|required',
            'ic'              => 'size:6|required|unique:traders',
            'nif'             => 'size:11|required|unique:traders',
            'age'             => 'required',
            'state'           => 'required',
            'phone'           => 'required|size:7|unique:traders',
            'product_id'      => 'required',
            'typeoftrader_id' => 'required',
        ];
    }
}
