<?php

namespace Sagmma\Http\Requests\SagmmaRequests;

use Sagmma\Http\Requests\Request;

class ProductsRequest extends Request
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name'        => 'min:4|max:60|required|unique:products,name,'.$this->id,
            'price'        => 'required',
            'description' => 'min:4|max:250',
        ];
    }
}
