<?php

namespace Sagmma\Models\Sagmma;

use Illuminate\Database\Eloquent\Model;

class Typeofemployee extends Model
{
    protected $table = 'typeofemployees';
    protected $guarded = ['id'];
    public $timestamps = false;


    //Relacionamentos

    public function employees()
    {
        return $this->hasMany(Employee::class, 'typeofemployee_id', 'id');
    }

}
