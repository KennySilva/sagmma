<?php

namespace Sagmma\Models\Sagmma;

use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    protected $table = 'places';

    protected $guarded = ['id'];

    //Relacionamentos;
    public function typeofplace()
    {
        return $this->belongsTo(Typeofplace::class, 'typeofplace_id', 'id');
    }
    //-------------------------------------------------------------------------------
    public function employees()
    {
        return $this->belongsToMany(Employee::class, 'employee_place', 'place_id', 'employee_id')->withPivot('income', 'status', 'note')->withTimestamps();
    }
    //-------------------------------------------------------------------------------
    public function traders()
    {
        return $this->belongsToMany(Trader::class, 'place_trader', 'place_id', 'trader_id')->withPivot('status')->withTimestamps();
    }

}
