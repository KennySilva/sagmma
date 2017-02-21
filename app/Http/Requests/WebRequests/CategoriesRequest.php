<?php

namespace Sagmma\Http\Requests\WebRequests;

use Sagmma\Http\Requests\Request;

class CategoriesRequest extends Request
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name'        => 'min:4|max:128|required|unique:categories',
            'description' => 'min:4|max:250',
        ];
    }
}
