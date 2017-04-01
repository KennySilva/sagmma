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
            'name'     => 'min:4|max:60|alpha_dash|required|unique:users,name,'.$this->id,
        'username' => 'min:4|max:30|required|alpha|unique:users,username,'.$this->id,
            'email'    => 'email|min:2|max:60|required|unique:users,email,'.$this->id,
            'password' => 'min:8|max:120|required',
            'ic' => 'digits:6|required|unique:users,ic,'.$this->id,
            'phone' =>  ['unique:users,phone,'.$this->id, 'Regex: /^\(\d{3}\)-\d{4}-\d{4}$/']
        ];
    }
}
