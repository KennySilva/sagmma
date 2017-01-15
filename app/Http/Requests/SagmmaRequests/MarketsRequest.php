<?php

namespace Sagmma\Http\Requests\SagmmaRequests;

use Sagmma\Http\Requests\Request;

class MarketsRequest extends Request
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name'        => 'min:4|max:128|required|unique:markets',
            'location'    => 'min:4|max:128|required|unique:markets',
            'description' => 'min:4|max:250',
        ];
    }
}
