<?php
namespace Sagmma\Models\Sagmma;
use Illuminate\Database\Eloquent\Model;

class Trader extends Model
{
    protected $table = 'traders';

    protected $guarded = ['id'];


    //Relacionamentos--------------------------------------------------------------------------------------------;
    public function promotion()
    {
        return $this->hasMany(Promotion::class);
    }

    // public function typeoftraders()
    // {
    //     return $this->belongsTo(Typeoftrader::class, 'typeoftrader_id', 'id');
    // }

    public function places()
    {
        return $this->belongsToMany(Place::class, 'place_trader', 'trader_id', 'place_id')->withPivot('status')->withTimestamps();
    }


}
