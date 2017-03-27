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
        // $today     = date('y-m-d');
        // $data = date('Y-m-d', strtotime("+5 month", strtotime($data)));
        // $date ='2018-01-01';
        $now = Carbon::now()->addYear(1);
        return [
            'place_id'    => 'required',
            'trader_id'   => 'required',
            'ending_date' => 'required|after:'.$now,
        ];
    }
}
