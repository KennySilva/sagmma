<?php

namespace Sagmma\Http\Requests\SagmmaRequests;
use Sagmma\Http\Requests\Request;
use Carbon\Carbon;

class EmployeesRequest extends Request
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $date = Carbon::now()->toDateString();
        return [
            'name'              => 'required|max:60|min:4',
            'ic'                => 'required|digits:6|Integer|unique:employees,ic,'.$this->id,
            'email'             => 'email|unique:employees,email,'.$this->id,
            'phone'             => 'digits:7|unique:employees,phone,'.$this->id,
            'service_beginning' => 'date|before:'.$date,
            'typeofemployee_id' => 'required',
            // 'ending_date' => 'required|after:'.$now,

        ];
    }
}
