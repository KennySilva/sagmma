<?php

namespace Sagmma\Models\Sagmma;

use Illuminate\Database\Eloquent\Model;

class Typeofplace extends Model
{
    protected $table = 'typeofplaces';
    protected $guarded = ['id'];
    // protected $fillable = ['name', 'description'];
    public $timestamps = false;


    //Relacionamentos

    public function places()
    {
        return $this->hasMany(Place::class, 'typeofplace_id', 'id');
    }

}
