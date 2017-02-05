<?php
namespace Sagmma\Models\Sagmma;
use Illuminate\Database\Eloquent\Model;

class Trader extends Model
{
    protected $table = 'traders';

    protected $guarded = ['id'];


    //Relacionamentos------------------------------------------------------------------------------------;
    public function promotion()
    {
        return $this->hasMany(Promotion::class);
    }

    public function places()
    {
        return $this->belongsToMany(Place::class, 'place_trader', 'trader_id', 'place_id')->withPivot('status', 'rate', 'author', 'ending_date')->withTimestamps();
    }

    public function contract()
    {
        return $this->belongsTo(Contract::class, 'trader_id', 'id');
    }

}
