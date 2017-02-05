<?php

namespace Sagmma\Models\Sagmma;

use Illuminate\Database\Eloquent\Model;

class Taxation extends Model
{
    protected $table = 'employee_place';
    protected $guarded = ['id'];

    //------------------------------------------------------------------------------
    public function employees()
    {
        return $this->hasMany(Employee::class, 'employee_id', 'id');
    }
    public function places()
    {
        return $this->hasMany(Place::class, 'place_id', 'id');
    }

}
