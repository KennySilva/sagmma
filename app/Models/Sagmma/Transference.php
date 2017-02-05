<?php

namespace Sagmma\Models\Sagmma;

use Illuminate\Database\Eloquent\Model;

class Transference extends Model
{
    protected $table = 'employee_market';
    protected $guarded = ['id'];

    //------------------------------------------------------------------------------
    public function employees()
    {
        return $this->hasMany(Employee::class, 'employee_id', 'id');
    }
    public function markets()
    {
        return $this->hasMany(Market::class, 'market_id', 'id');
    }

}
