<?php

namespace Sagmma\Http\Requests\WebRequests;

use Sagmma\Http\Requests\Request;

class ArticlesRequest extends Request
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title'   => 'min:4|max:128|required|unique:articles',
            'content' => 'min:4|max:250',
        ];
    }
}
