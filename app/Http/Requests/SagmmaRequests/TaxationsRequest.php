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
            'employee_id' => 'required',
            'place_id'    => 'required',
            'income'      => 'required',
            'type'        => 'required',
        ];
    }
}
