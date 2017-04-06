<?php

namespace Sagmma\Http\Requests\SagmmaRequests;

use Sagmma\Http\Requests\Request;

class MaterialsRequest extends Request
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name'        => 'min:4|max:49|required|unique:materials,name,'.$this->id,
            'description' => 'min:4|max:250',
        ];
    }
}
