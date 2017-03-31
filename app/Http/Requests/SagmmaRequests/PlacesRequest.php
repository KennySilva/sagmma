<?php

namespace Sagmma\Http\Requests\SagmmaRequests;

use Sagmma\Http\Requests\Request;

class PlacesRequest extends Request
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name'           => 'max:50|required|unique:places,name,'.$this->id,
            'typeofplace_id' => 'required',
            'price'          => 'numeric:required_unless:typeofplace_id,1|min:5000',
            'dimension'      => 'numeric:required_unless:typeofplace_id,1|min:4|max:50',
            'description'    => 'string|max:250'
        ];
    }
}
