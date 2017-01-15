<?php

namespace Sagmma\Http\Requests\SagmmaRequests;

use Sagmma\Http\Requests\Request;

class ContractsRequest extends Request
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'place_id'  => 'required',
            'trader_id' => 'required',
            'rate'      => 'required',
        ];
    }
}
