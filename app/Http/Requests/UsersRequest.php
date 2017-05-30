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
            // 'name' =>  ['max:60', 'min:4', 'required', 'Regex: /^[A-ZÉÚÍÓÁÈÙÌÒÀÕÃÑÊÛÎÔÂËYÜÏÖÄ]{1}[a-zéúíóáèùìòàõãñêûîôâëyüïöä]+( [A-ZÉÚÍÓÁÈÙÌÒÀÕÃÑÊÛÎÔÂËYÜÏÖÄ]{1}[a-zéúíóáèùìòàõãñêûîôâëyüïöä]+){1,3}$/'],

            'name'     => 'min:4|max:60|required',
            'username' => 'min:4|max:30|required|alpha_dash|unique:users,username,'.$this->id,
            'email'    => 'email|min:2|max:60|required|unique:users,email,'.$this->id,
            'password' => 'min:8|max:120|required',
            'ic' => 'digits:6|required|unique:users,ic,'.$this->id,
            'phone' => 'unique:users,phone,'.$this->id,
            'age'              => 'size:2',
            
            // 'phone' =>  ['unique:users,phone,'.$this->id, 'Regex: /^\(\d{3}\)-\d{4}-\d{4}$/']
        ];
    }
}
