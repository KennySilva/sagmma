<?php

namespace Sagmma\Models\Sagmma;

use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    protected $table = 'places';

    protected $guarded = ['id'];

    public function getStatusAttribute($value)
    {
        if ($value) {
            return true;
        }
        return false;
    }

    //Relacionamentos;
    public function taxation()
    {
        return $this->belongsTo(Taxaton::class, 'id', 'place_id');
    }

    public function contract()
    {
        return $this->belongsTo(Contract::class, 'id', 'place_id');
    }

    public function typeofplace()
    {
        return $this->belongsTo(Typeofplace::class, 'typeofplace_id', 'id');
    }
    //-------------------------------------------------------------------------------
    public function employees()
    {
        return $this->belongsToMany(Employee::class, 'employee_place', 'place_id', 'employee_id')->withPivot('income', 'type', 'author')->withTimestamps();
    }
    //-------------------------------------------------------------------------------
    public function traders()
    {
        return $this->belongsToMany(Trader::class, 'place_trader', 'place_id', 'trader_id')->withPivot('status', 'rate', 'author', 'ending_date')->withTimestamps();
    }

}
