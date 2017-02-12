<?php

namespace Sagmma\Http\Requests\SagmmaRequests;

use Sagmma\Http\Requests\Request;

class PromotionsRequest extends Request
{
    public function authorize()
    {
        return true;
    }
    
    public function rules()
    {
        return [
            'name'        => 'min:4|max:128|required',
            'trader_id'   => 'required',
            'product_id'  => 'required',
            'description' => 'min:4|max:500',
        ];
    }
}
