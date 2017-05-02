<?php

namespace Sagmma\Http\Requests\SagmmaRequests;
use Carbon\Carbon;
use Sagmma\Http\Requests\Request;

class PromotionsRequest extends Request
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $date = Carbon::yesterday()->toDateString();
        return [
            'name'        => 'min:4|max:128|required|unique:promotions,name,'.$this->id,
            'trader_id'   => 'required',
            'product_id'  => 'required',
            'description' => 'min:4|max:500',
            'begnning_date' => 'required|after:'.$date,
            'ending_date' => 'required|after:begnning_date',
        ];
    }
}
