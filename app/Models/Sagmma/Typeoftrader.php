<?php

namespace Sagmma\Models\Sagmma;

use Illuminate\Database\Eloquent\Model;

class Typeoftrader extends Model
{
    protected $table = 'typeoftraders';
    protected $guarded = ['id'];
    public $timestamps = false;

    //Relacionamentos
    public function traders()
    {
        return $this->hasMany(Trader::class, 'typeoftrader_id', 'id');
    }

}
