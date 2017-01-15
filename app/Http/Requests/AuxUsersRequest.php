<?php

namespace Sagmma\Http\Requests;

use Sagmma\Http\Requests\Request;

class AuxUsersRequest extends Request
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name'     => 'min:4|max:128|required',
            'username' => 'min:4|max:128|required',
            'email'    => 'min:4|max:250|required',
            'password' => 'min:4|max:120|required'
        ];
    }
}
