<?php

namespace Sagmma\Http\Requests;

use Sagmma\Http\Requests\Request;

class UsersRequest extends Request
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'name'     => 'min:4|max:60|required',
            'username' => 'min:4|max:30|required',
            'email'    => 'min:2|max:60|required|unique:users',
            'password' => 'min:4|max:120|required'
        ];
    }
}
