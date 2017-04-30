<?php

namespace Sagmma\Models\Sagmma;

use Illuminate\Database\Eloquent\Model;

class Taxation extends Model
{
    protected $table = 'employee_place';
    protected $guarded = ['id'];

    // public function getIncomeAttribute($value)
    // {
    //     if ($value) {
    //         // return number_format($value, 2);
    //         return sprintf('%s $00', number_format($value,2,",","."));
    //     }
    // }


    //------------------------------------------------------------------------------
    public function employees()
    {
        return $this->hasMany(Employee::class, 'id', 'employee_id');
    }
    public function places()
    {
        return $this->hasMany(Place::class, 'id', 'place_id');
    }
}
