<?php

namespace Sagmma\Models\Sagmma;

use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    protected $table = 'place_trader';
    protected $guarded = ['id'];

    public function getStatusAttribute($value)
    {
        if ($value) {
            return true;
        }
        return false;
    }
    
    //------------------------------------------------------------------------------
    public function places()
    {
        return $this->hasMany(Place::class, 'place_id', 'id');
    }
    public function traders()
    {
        return $this->hasMany(Trader::class, 'trader_id', 'id');
    }

}
