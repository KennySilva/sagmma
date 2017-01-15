<?php

namespace Sagmma\Models\Sagmma;

use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    protected $table = 'promotions';

    protected $guarded = ['id'];


    //Relacionamentos--------------------------------------------------------------------------------------------;
    public function trader()
    {
        return $this->belongsTo(Trader::class, 'trader_id', 'id');
    }


    public function product()
    {
        return $this->belongsTo(Product::class);
    }


}
