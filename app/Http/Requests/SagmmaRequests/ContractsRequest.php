<?php

namespace Sagmma\Http\Requests\SagmmaRequests;
use Carbon\Carbon;
use Sagmma\Http\Requests\Request;

class ContractsRequest extends Request
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $now = Carbon::now()->addYear(1)->toDateString();
        return [
            'place_id'    => 'required',
            'trader_id'   => 'required',
            'ending_date' => 'required|after:'.$now,
        ];
    }
}
