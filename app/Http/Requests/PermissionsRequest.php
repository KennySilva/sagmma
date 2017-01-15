<?php

namespace Sagmma\Http\Requests;

use Sagmma\Http\Requests\Request;

class PermissionsRequest extends Request
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name'     => 'min:4|max:128|required',
        ];
    }
}
