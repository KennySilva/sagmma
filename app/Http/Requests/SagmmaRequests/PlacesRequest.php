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
            'name'           => 'max:20|required',
            'typeofplace_id' => 'required',
        ];
    }
}
