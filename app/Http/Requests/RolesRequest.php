<?php

namespace Sagmma\Http\Requests;

use Sagmma\Http\Requests\Request;

class RolesRequest extends Request
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name'     => 'min:6|max:49|alpha_dash|required|unique:roles,name,'.$this->id,
            'display_name'     => 'min:6|max:59|required|unique:roles,name,'.$this->id,
        ];
    }
}
