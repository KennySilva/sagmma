<?php

namespace Sagmma\Models\Sagmma;

use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    protected $table = 'promotions';

    protected $guarded = ['id'];

    public function getStatusAttribute($value)
    {
        if ($value) {
            return true;
        }
        return false;
    }

    //Relacionamentos--------------------------------------------------------------------------------------------;
    public function trader()
    {
        return $this->belongsTo(Trader::class);
    }


    public function product()
    {
        return $this->belongsTo(Product::class);
    }


}
