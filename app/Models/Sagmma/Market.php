<?php

namespace Sagmma\Models\Sagmma;

use Illuminate\Database\Eloquent\Model;

class Market extends Model
{
    protected $table = 'markets';
    protected $guarded = ['id'];

    
    //Relacionamentos
    public function employees()
    {
        return $this->hasMany(Employee::class);
    }
}
