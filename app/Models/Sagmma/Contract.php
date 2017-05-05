<?php

namespace Sagmma\Models\Sagmma;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use User;

class Contract extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $table = 'place_trader';
    protected $guarded = ['id'];

    public function getAuthorAttribute($value)
    {
        if ($value) {
            $author = User::find($value);
        }
        return $author->name;
    }

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
        return $this->hasMany(Place::class, 'id', 'place_id');
    }
    public function traders()
    {
        return $this->hasMany(Trader::class, 'id', 'trader_id');
    }

}
