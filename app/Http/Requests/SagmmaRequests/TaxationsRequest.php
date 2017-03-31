<?php

namespace Sagmma\Http\Requests\SagmmaRequests;

use Sagmma\Http\Requests\Request;

class TaxationsRequest extends Request
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'type'=> 'required|in:1,2',
            'employee_id'    => 'required_if:type,2',
            'place_id'   => 'required',
            'income' => 'integer|min:500|max:20000|required_if:type,2',
        ];
    }
}
